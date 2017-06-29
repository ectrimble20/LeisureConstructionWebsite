<?php

namespace Leisure\Application\Controller;

use Leisure\Application\Model\Service\ServiceFactory;
use Leisure\Application\Model\Value\ImageValue;
use Leisure\Application\View\ErrorView;
use Leisure\Application\View\ImageEditView;
use Leisure\Application\View\ImageView;
use Leisure\Application\View\UserView;
use Leisure\Library\Common\Audit;
use Leisure\Library\Log\Log;
use Leisure\Library\Session\Session;

/**
 * Class UserController
 * @package Leisure\Application\Controller
 */
class ImageController extends Controller {

    /**
     * @return UserView
     */
    public function GET()
    {
        Log::Get()->debug(__METHOD__);
        if( $this->params->HasValue('image_id') ){
            $imageEntity = ServiceFactory::Image($this->params)->PullById();
            $this->params->Set('img_title', $imageEntity->getTitle());
            $this->params->Set('caption', $imageEntity->getCaption());
            $this->params->Set('record_date', $imageEntity->getRecordDate());
            $this->params->Set('image_user', $imageEntity->getUsername());
            $this->params->Set('image_guid',$imageEntity->getImageGuid());
            $this->params->Set('gallery_id',$imageEntity->getGalleryId());
            return new ImageEditView($this->params);
        } else {
            $this->params->Set('content', ServiceFactory::Image($this->params)->Search());
            return new ImageView($this->params);
        }
    }

    /**
     * @return ErrorView|UserView
     */
    public function PUT()
    {
        Log::Get()->debug(__METHOD__);
        if( ! $this->params->HasValue('image_id')){
            Log::Get()->error("Missing parameter image_id");
            return $this->throwError('Required Parameter not set in request');
        }
        if( ServiceFactory::Image($this->params)->Update() !== false){
            Audit::notice("Image ID ". $this->params->Get('image_id') ." updated by user ". Session::GetSessionUser());
            $this->ResetParams();
            $this->params->Set('status_message','Image Updated Successfully');
            $this->params->Set('message_alert_class','alert-success');
        } else {
            return $this->throwError("An error was encountered attempting to update the image");
        }
        return $this->GET();
    }

    /**
     * @return ErrorView|UserView
     */
    public function DELETE()
    {
        Log::Get()->debug(__METHOD__);
        if( ! $this->params->HasValue('image_id')){
            Log::Get()->error("Missing parameter image_id");
            return $this->throwError('Required Parameter not set in request');
        }
        $imageEntity = ServiceFactory::Image($this->params)->PullById();
        if( ServiceFactory::Image($this->params)->Delete() !== false){
            ServiceFactory::Image($this->params)->DeleteImage($imageEntity->getImageGuid());
            Audit::notice("Image ID ". $this->params->Get('image_id') ." deleted by user ". Session::GetSessionUser());
            $this->ResetParams();
            $this->params->Set('status_message','Image Deleted Successfully');
            $this->params->Set('message_alert_class','alert-success');
        } else {
            return $this->throwError("An error was encountered attempting to delete the image");
        }
        return $this->GET();
    }

    /**
     * @return ErrorView|UserView
     */
    public function POST()
    {
        Log::Get()->debug(__METHOD__);
        if( ! $this->CheckRequired(array('title','gallery_id'))){
            Log::Get()->error("Missing parameter(s) title|gallery_id");
            $this->params->LogDebug();
            return $this->throwError('Required Parameter not set in request');
        }
        if( ! isset($_FILES['image-file'])){
            Log::Get()->error("Missing 'image-file' from \$_FILES array");
            return $this->throwError('Required Parameter not set in request');
        }
        $imageGuid = ServiceFactory::Image($this->params)->StoreUploadedImage();
        if( $imageGuid === false ){
            Log::Get()->error("StoreUploadedImage failed to return GUID");
            return $this->throwError("An Error occurred uploading the image");
        }
        $this->params->Set('image_guid', $imageGuid);
        $this->params->Set('user_id', Session::GetSessionUserId());
        if( ServiceFactory::Image($this->params)->Store() !== false ) {
            Audit::notice("New image ". $imageGuid ." created by user ". Session::GetSessionUser());
            $this->ResetParams();
            $this->params->Set('status_message','Upload Successful');
            $this->params->Set('message_alert_class','alert-success');
            return $this->GET();
        } else {
            Audit::critical("System error occurred attempting to upload a new image");
            Log::Get()->error("Unknown upload error occurred, database insert failed");
            return $this->throwError("Image upload failed, internal server error detected");
        }
    }

}