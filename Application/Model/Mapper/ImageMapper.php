<?php

namespace Leisure\Application\Model\Mapper;

use Leisure\Application\Model\Entity\ImageEntity;
use Leisure\Application\Model\Query\QueryInsert;
use Leisure\Application\Model\Query\QuerySelect;
use Leisure\Application\Model\Query\QueryUpdate;
use Leisure\Library\DBO\DBO;
use Leisure\Library\Log\Log;

class ImageMapper extends Mapper {

    /**
     * @return ImageEntity[]
     */
    public static function GetAll()
    {
        return self::GenerateEntities(DBO::Get()->Select(QuerySelect::Images(), array()));
    }

    /**
     * @param $galleryId
     * @return ImageEntity[]
     */
    public static function GetByGallery($galleryId)
    {
        return self::GenerateEntities(DBO::Get()->Select(QuerySelect::ImagesByGalleryId(), array(':gallery_id'=>$galleryId)));
    }

    /**
     * @param $imageId
     * @return ImageEntity
     */
    public static function GetById($imageId)
    {
        return new ImageEntity(DBO::Get()->SelectSingleRow(QuerySelect::ImageById(), array(':image_id'=>$imageId)));
    }

    public static function UpdateMeta($imageId, $title, $caption, $galleryId)
    {
        $result = DBO::Get()->Update(QueryUpdate::ImageMeta(),
            array(':image_id'=>$imageId,':title'=>$title,':caption'=>$caption,'gallery_id'=>$galleryId)
        );
        if( $result !== false ){
            return true;
        } else {
            return false;
        }
    }

    public static function UpdateActive($imageId, $active)
    {
        $result = DBO::Get()->Update(QueryUpdate::ImageActive(), array(':image_id'=>$imageId,':active'=>$active));
        if( $result !== false ){
            return true;
        } else {
            return false;
        }
    }

    public static function Delete($imageId)
    {
        $result = DBO::Get()->Update(QueryUpdate::ImageDelete(), array(':image_id'=>$imageId));
        if( $result !== false ){
            return true;
        } else {
            return false;
        }
    }

    public static function Insert($params = array())
    {
        $imageId = DBO::Get()->Insert(QueryInsert::Image(), $params);
        if( $imageId !== false){
            return true;
        }
        return false;
    }


    /**
     * @param $results
     * @return ImageEntity[]|ImageEntity|array
     */
    private static function GenerateEntities($results)
    {
        $objects = array();
        if( count($results) > 0) {
                foreach ($results as $row) {
                    $objects[] = new ImageEntity($row);
                }
        }
        return $objects;
    }

}