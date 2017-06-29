<?php


function __($input, $byPassHtmlSpecialChars = false) {
    if( is_array($input) || is_object($input))
    {
        return "[Unable To Parse]";
    }
    if( $byPassHtmlSpecialChars === true )
    {
        return $input;
    }
    else
    {
        return htmlspecialchars($input);
    }
}


function __GUID(){
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}


//Thumbnail generation script
//takes an imagePath, thumbPath, and thumbWidth as arguments
function CreateThumbnail( $imagePath, $thumbPath, $thumbWidth )
{
    $imgInfo = pathinfo($imagePath);
    if( strtolower($imgInfo['extension']) == 'jpg' || strtolower($imgInfo['extension']) == 'jpeg') {
        $image = imagecreatefromjpeg($imagePath);
    } elseif( strtolower($imgInfo['extension']) == 'png') {
        $image = imagecreatefrompng($imagePath);
    } elseif( strtolower($imgInfo['extension']) == 'gif') {
        $image = imagecreatefromgif($imagePath);
    } else {
        return false;
    }

    $width = imagesx($image);
    $height = imagesy($image);

    $newWidth = $thumbWidth;
    $newHeight = floor( $height * ($thumbWidth/$width));

    $tmpImg = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresized($tmpImg, $image, 0,0,0,0,$newWidth,$newHeight,$width,$height);
    if( strtolower($imgInfo['extension']) == 'jpg' || strtolower($imgInfo['extension']) == 'jpeg') {
        imagejpeg($tmpImg, "{$thumbPath}{$imgInfo['filename']}.jpg");
    } elseif( strtolower($imgInfo['extension']) == 'png') {
        imagepng($tmpImg, "{$thumbPath}{$imgInfo['filename']}.png");
    } elseif( strtolower($imgInfo['extension']) == 'gif') {
        imagegif($tmpImg, "{$thumbPath}{$imgInfo['filename']}.gif");
    } else {
        return false;
    }
    return true;
}


function ResizeImage($imagePath, $imageWidth, $imageHeight, $makeTemp = false)
{
    $imageInfo = pathinfo($imagePath);
    $imageExtension = $imageInfo['extension'];
    $imageName = $imageInfo['filename'];
    $imageDir = $imageInfo['dirname'];
    switch($imageExtension){
        case 'jpg':
        case 'jpeg':
            $image = imagecreatefromjpeg($imagePath);
            break;
        case 'gif':
            $image = imagecreatefromgif($imagePath);
            break;
        case 'png':
            $image = imagecreatefrompng($imagePath);
            break;
        default:
            return false;
    }

    $width = imagesx($image);
    $height = imagesy($image);
    $tmpImg = imagecreatetruecolor($imageWidth, $imageHeight);

    if( $makeTemp === true){
        //generate temp image
        $newImagePath = $imageDir ."/". $imageName .".tmp.". $imageExtension;
    } else {
        //over-write
        $newImagePath = $imagePath;
    }
    imagecopyresized($tmpImg, $image, 0,0,0,0,$imageWidth,$imageHeight,$width,$height);
    switch($imageExtension){
        case 'jpg':
        case 'jpeg':
            imagejpeg($tmpImg, $newImagePath);
            break;
        case 'gif':
            imagegif($tmpImg, $newImagePath);
            break;
        case 'png':
            imagepng($tmpImg, $newImagePath);
            break;
        default:
            return false;
    }
    return true;
}
