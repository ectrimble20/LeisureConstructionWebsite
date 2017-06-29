<?php

namespace Leisure\Library\Common;

class ImageManipulation {

    /*
     * Functions we need:
     *
     * SaveTempImage - save or over-write an existing image
     * Cache store and retrieve - so we can run from a session
     *
     */

    private $action_log = array();

    private $image_path = null;
    private $temp_image_path = null;

    private $image_dirname = null;
    private $image_basename = null;
    private $image_extension = null;
    private $image_filename = null;

    private $image_width_px = 0;
    private $image_height_px = 0;

    private $image_create_function = '';
    private $image_function = '';

    public function __construct($path_to_image)
    {
        $this->image_path = $path_to_image;
        $this->logAction("ImagePath set to ". $path_to_image);
        if( is_file($this->image_path) && is_readable($this->image_path)){
            $image_info = pathinfo($this->image_path);
            $this->image_dirname = $image_info['dirname'];
            $this->image_basename = $image_info['basename'];
            $this->image_extension = strtolower($image_info['extension']);
            $this->image_filename = $image_info['filename'];
        } else {
            $this->logAction("Image path information could not be obtained as the image was not readable");
            throw new \Exception("Image at ". $this->image_path ." either does not exist or is not edit-able");
        }

        switch($this->image_extension){
            case 'jpeg':
            case 'jpg':
                $this->image_function = 'imagejpeg';
                $this->image_create_function = 'imagecreatefromjpeg';
                break;
            case 'gif':
                $this->image_function = 'imagegif';
                $this->image_create_function = 'imagecreatefromgif';
                break;
            case 'png':
                $this->image_function = 'imagepng';
                $this->image_create_function = 'imagecreatefrompng';
                break;
            default:
                $this->logAction("Image extention was ". $this->image_extension .", this is not a valid image type");
                throw new \Exception("Image at ". $this->image_path ." is an invalid image format, must be jpg, jpeg, gif or png");
        }

        $this->image_width_px = imagesx($this->image_path);
        $this->image_height_px = imagesy($this->image_path);

    }

    public function CreateTempImage()
    {
        $this->logAction("Creating temporary image for ". $this->image_path);
        $this->temp_image_path = call_user_func($this->image_create_function, $this->image_path);
        $this->logAction("Temp Image created at ". $this->temp_image_path);
    }

    public function ClearTempImage()
    {
        $this->logAction("Removing temporary image");
        if( file_exists($this->temp_image_path) && is_writable($this->temp_image_path)){
            unlink($this->temp_image_path);
            $this->temp_image_path = null;
            $this->logAction("Temporary image removed successfully");
        } elseif( file_exists($this->temp_image_path) && ! is_writable($this->temp_image_path) ){
            $this->logAction("Temporary image was not able to be removed as it is not write-able");
            throw new \Exception("Unable to delete temporary image at ". $this->temp_image_path .", the file is not write-able");
        } else {
            $this->logAction("Image did not appear to be set, this is unusual but not considered critical, simply nulling the object");
            $this->temp_image_path = null;
        }
    }

    /**
     * @param $resizeWidth
     * @param $resizeHeight
     * @return bool
     * @throws \Exception
     *
     * NOTE: this needs to be tested that it actually works
     */
    public function ResizeTemporaryImage($resizeWidth, $resizeHeight)
    {
        if( $this->tempImageExists() === false ){
            $this->CreateTempImage();
        }
        $tempImageBase = imagecreatetruecolor($resizeWidth, $resizeHeight);
        $guid = new Guid();
        $tempImageName = $guid->NewGUID();
        $newImagePath = Settings::IMAGE_STORE_DIR . $tempImageName .".". $this->image_extension;
        imagecopyresized($tempImageBase, $this->temp_image_path, 0,0,0,0,$this->image_width_px,$this->image_height_px,$resizeWidth,$resizeHeight);
        call_user_func($this->image_function, $tempImageBase, $newImagePath);
        if( file_exists($newImagePath) ){
            return true;
        } else {
            throw new \Exception("Image resize appears to have failed, no new image exists after execution of process");
        }
    }

    private function tempImageExists()
    {
        if( file_exists($this->temp_image_path) ) {
            return true;
        } else {
            return false;
        }
    }

    private function logAction($action)
    {
        $this->action_log[] = $action;
    }



}