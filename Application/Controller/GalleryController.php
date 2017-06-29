<?php

namespace Leisure\Application\Controller;

use Leisure\Application\Model\Service\ServiceFactory;
use Leisure\Application\Model\Value\ImageValue;
use Leisure\Application\View\ErrorView;
use Leisure\Application\View\GalleryView;
use Leisure\Application\View\ImageEditView;
use Leisure\Application\View\ImageView;
use Leisure\Application\View\UserView;
use Leisure\Library\Common\Audit;
use Leisure\Library\Common\Settings;
use Leisure\Library\Log\Log;
use Leisure\Library\Session\Session;

/**
 * Class GalleryController
 * @package Leisure\Application\Controller
 */
class GalleryController extends Controller {

    protected $doNotValidate = true;

    /**
     * @return UserView
     */
    public function GET()
    {
        if( ! $this->params->HasValue('gallery_id') ){
            return $this->throwError("Invalid Gallery Request:  No Gallery Selected");
        }
        if( (int) $this->params->Get('gallery_id') === 1 ) {
            $images = ServiceFactory::Image($this->params)->PullByGallery();
            $gallery_title = "Commercial Gallery";
        } elseif((int) $this->params->Get('gallery_id') === 2 ) {
            $gallery_title = "Residential Gallery";
            $images = ServiceFactory::Image($this->params)->PullByGallery();
        } else {
            return $this->throwError("Invalid Gallery Request:  Invalid Gallery Selected");
        }

        $content = '';
        foreach($images as $imageEntity){
            if( (int) $imageEntity->getActive() === 0 ) {
                continue;
            }
            $imageLink = Settings::IMAGE_DISPLAY_DIR . $imageEntity->getImageGuid();
            $thumbLink = Settings::IMAGE_THUMB_DISPLAY_DIR . $imageEntity->getImageGuid();
            $titleLead = $imageEntity->getTitle();
            //<a href="1.jpg"><img src="1_thumb.jpg"></a>
            $content .= '<a href="'.$imageLink.'"><img src="'.$thumbLink.'" data-caption="'.$titleLead.'" /></a>
            ';
        }
        $this->params->Set('content', $content);
        $this->params->Set('gallery_title', $gallery_title);
        return new GalleryView($this->params);
    }

    /**
     * @return ErrorView|UserView
     */
    public function PUT()
    {
        return $this->throwError("Invalid Request Method");
    }

    /**
     * @return ErrorView|UserView
     */
    public function DELETE()
    {
        return $this->throwError("Invalid Request Method");
    }

    /**
     * @return ErrorView|UserView
     */
    public function POST()
    {
        return $this->throwError("Invalid Request Method");
    }

}