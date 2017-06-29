<?php

namespace Leisure\Application\Model\Mapper;

use Leisure\Application\Model\Entity\EndorseEntity;
use Leisure\Application\Model\Query\QueryInsert;
use Leisure\Application\Model\Query\QuerySelect;
use Leisure\Application\Model\Query\QueryUpdate;
use Leisure\Library\DBO\DBO;
use Leisure\Library\Log\Log;

/**
 * Class EndorseMapper
 * @package Leisure\Application\Model\Mapper
 */
class EndorseMapper extends Mapper {

    /**
     * @return \Leisure\Application\Model\Entity\EndorseEntity[]
     */
    public static function GetList()
    {
        return self::GenerateEntities(DBO::Get()->Select(QuerySelect::EndorseAll(), array()));
    }

    /**
     * @return \Leisure\Application\Model\Entity\EndorseEntity[]
     */
    public static function GetActiveList()
    {
        return self::GenerateEntities(DBO::Get()->Select(QuerySelect::EndorserActive(), array()));
    }

    /**
     * @param $endorse_id
     * @return EndorseEntity
     */
    public static function GetById($endorse_id)
    {
        return new EndorseEntity(DBO::Get()->SelectSingleRow(QuerySelect::EndorserById(), array(':endorse_id'=>$endorse_id)));
    }

    /**
     * @param $endorse_id
     * @param $body
     * @param $endorser
     * @return bool
     */
    public static function UpdateMeta($endorse_id, $body, $endorser)
    {
        $result = DBO::Get()->Update(QueryUpdate::EndorseMeta(), array(':endorse_id'=>$endorse_id,':body'=>$body,':endorser'=>$endorser));
        if( $result !== false ){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $endorse_id
     * @param $active
     * @return bool
     */
    public static function UpdateActive($endorse_id, $active)
    {
        Log::Get()->debug("Updating endorserment, setting active to ". $active ." for endorse_id ". $endorse_id);
        $result = DBO::Get()->Update(QueryUpdate::EndorseActive(), array(':endorse_id'=>$endorse_id,':active'=>$active));
        if( $result !== false ){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $endorse_id
     * @return bool
     */
    public static function Delete($endorse_id)
    {
        $result = DBO::Get()->Update(QueryUpdate::EndorseDelete(), array(':endorse_id'=>$endorse_id));
        if( $result !== false ){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param array $params
     * @return bool
     */
    public static function Create($params = array())
    {
        $result = DBO::Get()->Insert(QueryInsert::Endorser(), $params);
        if( $result !== false ){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $results
     * @return EndorseEntity[]
     */
    private static function GenerateEntities($results)
    {
        $objects = array();
        if( count($results) > 0) {
            foreach ($results as $row) {
                $objects[] = new EndorseEntity($row);
            }
        }
        return $objects;
    }

}