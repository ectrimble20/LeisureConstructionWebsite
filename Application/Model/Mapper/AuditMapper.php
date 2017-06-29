<?php

namespace Leisure\Application\Model\Mapper;

use Leisure\Application\Model\Entity\AuditEntity;
use Leisure\Application\Model\Query\QueryInsert;
use Leisure\Application\Model\Query\QuerySelect;
use Leisure\Library\DBO\DBO;

/**
 * Class AuditMapper
 * @package Leisure\Application\Model\Mapper
 */
class AuditMapper extends Mapper {

    /**
     * @return \Leisure\Application\Model\Entity\AuditEntity[]
     */
    public static function GetList()
    {
        return self::GenerateEntities(DBO::Get()->Select(QuerySelect::Audit(), array()));
    }

    /**
     * @param $searchOn
     * @return \Leisure\Application\Model\Entity\AuditEntity[]
     */
    public static function Search($searchOn)
    {
        $base = QuerySelect::AuditBaseSearch();
        $parts = explode(" ", $searchOn);
        $searchParams = array();
        if( count($parts) === 1){
            $base .= " action LIKE :part";
            $searchParams[':part'] = "%".$searchOn."%";
        } else {
            $inc = 0;
            $query = array();
            foreach($parts as $part)
            {
                $locator = ":part".$inc;
                $searchParams[$locator] = "%".$part."%";
                $query[] = " action LIKE ". $locator ." ";
                $inc++;
            }
            $base .= implode("AND", $query);
        }
        return self::GenerateEntities(DBO::Get()->Select($base, $searchParams));
    }

    /**
     * @param $typeId
     * @return \Leisure\Application\Model\Entity\AuditEntity[]
     */
    public static function FilterByType($typeId)
    {
        return self::GenerateEntities(DBO::Get()->Select(QuerySelect::AuditByType(), array(':audit_level_id'=>$typeId)));
    }

    /**
     * @param $date_from
     * @param $date_to
     * @return \Leisure\Application\Model\Entity\AuditEntity[]
     */
    public static function FilterByDateRange($date_from, $date_to)
    {
        return self::GenerateEntities(DBO::Get()->Select(QuerySelect::AuditByDateRange(),
            array(':date_from'=>$date_from." 00:00:00",':date_to'=>$date_to." 23:59:59")));
    }

    /**
     * @param $typeId
     * @param $date_from
     * @param $date_to
     * @return \Leisure\Application\Model\Entity\AuditEntity[]
     */
    public static function FilterByTypeAndDateRange($typeId, $date_from, $date_to)
    {
        return self::GenerateEntities(DBO::Get()->Select(QuerySelect::AuditByTypeAndDate(),
            array(':audit_level_id'=>$typeId,':date_from'=>$date_from." 00:00:00",':date_to'=>$date_to." 23:59:59")));
    }

    /**
     * @param $action
     * @param $audit_level_id
     * @return bool
     */
    public static function Insert($action, $audit_level_id)
    {
        $id = DBO::Get()->Insert(QueryInsert::Audit(), array(':action'=>$action,'audit_level_id'=>$audit_level_id));
        if( $id !== false){
            return true;
        }
        return false;
    }

    /**
     * @param $results
     * @return AuditEntity[]
     */
    private static function GenerateEntities($results)
    {
        $objects = array();
        if( count($results) > 0) {
            foreach ($results as $row) {
                $objects[] = new AuditEntity($row);
            }
        }
        return $objects;
    }

}