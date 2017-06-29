<?php

namespace Leisure\Application\Controller;

use Leisure\Application\Model\Service\ServiceFactory;
use Leisure\Application\View\ImageResizeView;
use Leisure\Application\View\View;
use Leisure\Library\Common\Audit;
use Leisure\Library\Common\Settings;
use Leisure\Library\Log\Log;
use Leisure\Library\Session\Session;

class ResizeController extends Controller {
    public function GET()
    {
        Log::Get()->debug(__METHOD__);
        if( $this->params->HasValue('image_id') ){
            $imageEntity = ServiceFactory::Image($this->params)->PullById();
            $this->params->Set('image_guid',$imageEntity->getImageGuid());
            $imageInfo = ServiceFactory::Image($this->params)->GetImageSizeInformation($imageEntity->getImageGuid());
            if( $imageInfo === false){
                return $this->throwError('Unable to read file information from disk, please make sure the image exists');
            } else {
                $this->params->Set('image_width', $imageInfo['width']);
                $this->params->Set('image_height', $imageInfo['height']);
                $this->params->Set('image_preview', 0); //indicate this is NOT a preview
                return new ImageResizeView($this->params);
            }
        } else {
            Log::Get()->error("Missing parameter image_id");
            return $this->throwError('Required Parameter not set in request');
        }
    }

    /*[2016-02-29 21:48:28][DEBUG] Params::Key[_METHOD]put
[2016-02-29 21:48:28][DEBUG] Params::Key[preview]0
[2016-02-29 21:48:28][DEBUG] Params::Key[image_width]800
[2016-02-29 21:48:28][DEBUG] Params::Key[image_height]533
[2016-02-29 21:48:28][DEBUG] Params::Key[action_save]1
[2016-02-29 21:48:28][DEBUG] Params::Key[image_id]11
*/

    public function PUT()
    {
        Log::Get()->debug(__METHOD__);
        if( $this->params->HasValue('image_id') ){
            $imageEntity = ServiceFactory::Image($this->params)->PullById();
            $this->params->Set('image_guid',$imageEntity->getImageGuid());
            $this->params->Set('image_id', $imageEntity->getImageId());
            //is this another preview, or a save
            if( $this->params->HasValue('action_save')){
                //return $this->throwError('Save feature not yet implemented');
                if( ResizeImage(Settings::IMAGE_STORE_DIR . $imageEntity->getImageGuid(), $this->params->Get('image_width'), $this->params->Get('image_height'), false)) {
                    Audit::notice("Image ". $imageEntity->getImageGuid() ." resized by user ". Session::GetSessionUser());
                    $this->ResetParams();
                    $this->params->Set('image_id', $imageEntity->getImageId());
                    $this->params->Set('status_message','Image Re-sized Successfully');
                    $this->params->Set('message_alert_class','alert-info');
                    return $this->GET();
                } else {
                    return $this->throwError('Server Error:  Image re-size failed');
                }
            } else {
                //assume another preview
                if( ResizeImage(Settings::IMAGE_STORE_DIR . $imageEntity->getImageGuid(), $this->params->Get('image_width'), $this->params->Get('image_height'), true)) {
                    //a temp image will have been generated here
                    $imageParts = explode(".", $imageEntity->getImageGuid());
                    $tmpImageGuid = $imageParts[0].".tmp.".$imageParts[1];
                    $this->params->Set('image_guid', $tmpImageGuid);
                    $imageInfo = ServiceFactory::Image($this->params)->GetImageSizeInformation($tmpImageGuid);
                    $this->params->Set('image_width', $imageInfo['width']);
                    $this->params->Set('image_height', $imageInfo['height']);
                    $this->params->Set('image_preview', 1); //indicate this is a preview
                    return new ImageResizeView($this->params);
                } else {
                    return $this->throwError('Server Error:  Image re-size failed');
                }
            }
        } else {
            Log::Get()->error("Missing parameter image_id");
            return $this->throwError('Required Parameter not set in request');
        }
    }

    public function DELETE()
    {
        return $this->throwError("Invalid Request Method");
    }

    public function POST()
    {
        return $this->throwError("Invalid Request Method");
    }

}