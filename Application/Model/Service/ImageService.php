<?php

namespace Leisure\Application\Model\Service;

use Leisure\Application\Model\Entity\ImageEntity;
use Leisure\Application\Model\Mapper\ImageMapper;
use Leisure\Library\Common\Settings;
use Leisure\Library\Log\Log;
use Leisure\Library\Template\Component;

class ImageService extends Service {

    /**
     * @return ImageEntity
     */
    public function PullById()
    {
        return ImageMapper::GetById($this->params->Get('image_id'));
    }

    /**
     * @return ImageEntity[]
     */
    public function PullByGallery()
    {
        return ImageMapper::GetByGallery($this->params->Get('gallery_id'));
    }

    /**
     * @return string
     */
    public function Search()
    {
        $html = "";
        //images can be listed by gallery_id, if not present, present all images
        if( ! $this->params->HasValue('gallery_id')) {
            $imageList = ImageMapper::GetAll();
        } else {
            $imageList = ImageMapper::GetByGallery($this->params->Get('gallery_id'));
        }
        if( count($imageList) > 0){
            foreach($imageList as $imageEntity)
            {
                $html .= Component::ImageTR($imageEntity->getImageId(), $imageEntity->getTitle(),
                    $imageEntity->getCaption(), $imageEntity->getRecordDate(),
                    $imageEntity->getLabel(), $imageEntity->getActive());
            }
        } else {
            $html = "<tr><td colspan='7' align='center'>No Results</td></tr>";
        }
        return $html;
    }

    /**
     * @return bool
     */
    public function Store()
    {
        $params = array(
            ':user_id'=>$this->params->Get('user_id'),
            ':image_guid'=>$this->params->Get('image_guid'),
            ':gallery_id'=>$this->params->Get('gallery_id'),
            ':title'=>$this->params->Get('title'),
            ':caption'=>$this->params->Get('caption')
        );
        return ImageMapper::Insert($params);
    }

    /**
     * @return bool
     */
    public function Update()
    {
        if( $this->params->HasValue('active')) {
            return ImageMapper::UpdateActive($this->params->Get('image_id'),$this->params->Get('active'));
        } else {
            return ImageMapper::UpdateMeta($this->params->Get('image_id'),$this->params->Get('title'),
                $this->params->Get('caption'),$this->params->Get('gallery_id'));
        }
    }

    /**
     * @return bool
     */
    public function Delete()
    {
        return ImageMapper::Delete($this->params->Get('image_id'));
    }

    /**
     * Saves image from $_FILES array and returns GUID image name
     *
     * @return bool|string
     */
    public function StoreUploadedImage()
    {
        $allowedExt =  array('png' ,'jpg','jpeg');
        $check = getimagesize($_FILES['image-file']['tmp_name']);
        if( $check === false ) {
            Log::Get()->error("Unable to detect bytes in uploaded image, unable to store");
            return false;
        }
        $extension = strtolower(pathinfo(basename($_FILES['image-file']['name']), PATHINFO_EXTENSION));
        if( ! in_array($extension,$allowedExt)){
            Log::Get()->error("Invalid extension for uploaded file, ". $extension ." is not allowed");
            return false;
        }
        $guid = __GUID();
        $imageGUID = $guid .".". $extension;
        $fullImagePath = Settings::IMAGE_STORE_DIR . $imageGUID;
        if( move_uploaded_file($_FILES['image-file']['tmp_name'], $fullImagePath)){
            if( ! CreateThumbnail($fullImagePath, Settings::IMAGE_THUMB_DIR, Settings::THUMBNAIL_WIDTH))
            {
                Log::Get()->error("Thumbnail creation failed for ". $fullImagePath);
                return false;
            }
            return $imageGUID;
        } else {
            Log::Get()->error("Unable to move uploaded file from stream to ". $fullImagePath);
            return false;
        }
    }

    /**
     * Deletes image off file system
     *
     * @param $image_guid
     * @return bool
     */
    public function DeleteImage($image_guid)
    {
        $fullPath = Settings::IMAGE_STORE_DIR . $image_guid;
        $fullPathThumb = Settings::IMAGE_THUMB_DIR . $image_guid;
        if( file_exists($fullPath) && file_exists($fullPathThumb))
        {
            if( unlink($fullPath) && unlink($fullPathThumb)){
                Log::Get()->debug("deleted image: ". $fullPath);
                return true;
            } else {
                Log::Get()->error("Error deleting file ". $fullPath);
                return false;
            }
        }
        else
        {
            Log::Get()->error("DeleteImage called on non-existent file ". $fullPath);
            return false;
        }
    }

    /**
     * @param string $image_guid
     * @return array|bool
     */
    public function GetImageSizeInformation($image_guid)
    {
        $fullPath = Settings::IMAGE_STORE_DIR . $image_guid;
        if( ! file_exists($fullPath)){
            Log::Get()->error("Image ". $image_guid ." was not found at ". $fullPath);
            return false;
        }
        $imageInfo = getimagesize($fullPath);
        if( empty($imageInfo)){
            Log::Get()->error("Image ". $image_guid ." returned no information from getimagesize()");
            return false;
        }
        $imageData = array(
            'width'=>$imageInfo[0],
            'height'=>$imageInfo[1]
        );
        return $imageData;
    }

}