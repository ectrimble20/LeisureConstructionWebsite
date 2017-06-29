<?php

namespace Leisure\Application\Model\Mapper;

use Leisure\Application\Model\Entity\AboutEntity;
use Leisure\Application\Model\Query\QueryInsert;
use Leisure\Application\Model\Query\QuerySelect;
use Leisure\Library\DBO\DBO;

class AboutMapper extends Mapper {

    public static function GetCurrentActive()
    {
        return new AboutEntity(DBO::Get()->SelectSingleRow(QuerySelect::AboutCurrent(), array()));
    }

    public static function Create($params = array())
    {
        $id = DBO::Get()->Insert(QueryInsert::About(), $params);
        if( $id !== false){
            return true;
        }
        return false;
    }

}