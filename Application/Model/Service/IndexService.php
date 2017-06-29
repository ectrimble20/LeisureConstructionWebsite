<?php

namespace Leisure\Application\Model\Service;

use Leisure\Application\Model\Mapper\AboutMapper;
use Leisure\Application\Model\Mapper\EndorseMapper;
use Leisure\Application\Model\Mapper\ImageMapper;
use Leisure\Library\Common\Settings;
use Leisure\Library\Template\Component;

class IndexService extends Service {

    /**
     * @return array
     */
    public function GetIndexContent()
    {
        $pageContent = array();
        //first, load main screen gallery content
        $imageEntities = ImageMapper::GetByGallery(Settings::GALLERY_MAIN_SCREEN_ID);
        $mainGalleryHtml = "";
        $galleryItems = 0;
        $lead = true;
        if( count($imageEntities) > 0) {
            foreach ($imageEntities as $imageEntity) {
                if( (int) $imageEntity->getActive() === 0){
                    continue;
                }
                if ($galleryItems > 0) {
                    $lead = false;
                }
                $mainGalleryHtml .= Component::MainScreenGalleryItem($imageEntity->getImageGuid(), $imageEntity->getTitle(), $imageEntity->getCaption(), $lead);
                $galleryItems++;
            }
        }

        $residentialGalleryImages = ImageMapper::GetByGallery(Settings::GALLERY_RESIDENTIAL_ID);
        $resGalHtml = "";
        if(count($residentialGalleryImages) > 0){
            foreach($residentialGalleryImages as $residentialGalleryImage){
                if( (int) $residentialGalleryImage->getActive() === 0){
                    continue;
                }
                //$content .= '<a href="'.$imageLink.'"><img src="'.$thumbLink.'" data-caption="'.$titleLead.'" /></a>';
                $resGalHtml .= '<a href="'.Settings::IMAGE_DISPLAY_DIR . $residentialGalleryImage->getImageGuid() .'">
                <img src="'.Settings::IMAGE_THUMB_DISPLAY_DIR . $residentialGalleryImage->getImageGuid() .'"
                data-caption="'.$residentialGalleryImage->getTitle().'"></a>';
            }
        }
        $pageContent['gallery_residential_content'] = $resGalHtml;
        $commercialGalleryImages = ImageMapper::GetByGallery(Settings::GALLERY_COMMERCIAL_ID);
        $comGalHtml = "";
        if(count($commercialGalleryImages) > 0){
            foreach($commercialGalleryImages as $commercialGalleryImage){
                if( (int) $commercialGalleryImage->getActive() === 0){
                    continue;
                }
                $comGalHtml .= '<a href="'.Settings::IMAGE_DISPLAY_DIR . $commercialGalleryImage->getImageGuid() .'">
                <img src="'.Settings::IMAGE_THUMB_DISPLAY_DIR . $commercialGalleryImage->getImageGuid() .'"
                data-caption="'.$commercialGalleryImage->getTitle().'"></a>';
            }
        }
        $pageContent['gallery_commercial_content'] = $comGalHtml;


        $pageContent['gallery_main_screen_content'] = $mainGalleryHtml;
        //next, load endorser items
        $endorserHtml = "";
        $endorseEntities = EndorseMapper::GetActiveList();
        $lead = true;
        $endorseItems = 0;
        if( count($endorseEntities) > 0){
            foreach($endorseEntities as $endorseEntity){
                if( $endorseItems > 0){
                    $lead = false;
                }
                $endorserHtml .= Component::MainScreenEndorseItem($endorseEntity->getBody(),$endorseEntity->getEndorser(), $lead);
                $endorseItems++;
            }
        }
        $pageContent['endorser_content'] = $endorserHtml;
        //excellente, not just pull about and return the array to the controller
        $currentAboutEntity = AboutMapper::GetCurrentActive();
        $pageContent['about_header'] = $currentAboutEntity->getHeader();
        $pageContent['about_lead_in'] = $currentAboutEntity->getLeadIn();
        $pageContent['about_body'] = $currentAboutEntity->getBody();
        return $pageContent;
    }

}