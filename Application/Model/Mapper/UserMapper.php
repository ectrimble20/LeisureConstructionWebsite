<?php

namespace Leisure\Application\Model\Mapper;

use Leisure\Application\Model\Entity\UserEntity;
use Leisure\Application\Model\Query\QueryInsert;
use Leisure\Application\Model\Query\QuerySelect;
use Leisure\Application\Model\Query\QueryUpdate;
use Leisure\Library\DBO\DBO;
use Leisure\Library\Log\Log;

class UserMapper extends Mapper {

    /**
     * @return UserEntity[]
     */
    public static function GetAll()
    {
        return self::GenerateEntities(DBO::Get()->Select(QuerySelect::Users(), array()));
    }

    /**
     * @param $username
     * @param $password
     * @return UserEntity
     */
    public static function FindByLogin($username, $password)
    {
        return new UserEntity(DBO::Get()->SelectSingleRow(QuerySelect::UserByLogin(), array(':username'=>$username,':password'=>$password)));
    }

    /**
     * @param $userId
     * @return bool
     */
    public static function Delete($userId)
    {
        $result = DBO::Get()->Update(QueryUpdate::UserDelete(), array('user_id'=>$userId));
        if( $result !== false ){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $userId
     * @param $password
     * @return bool
     */
    public static function UpdatePassword($userId, $password)
    {
        $result = DBO::Get()->Update(QueryUpdate::UserPassword(), array('user_id'=>$userId,':password'=>$password));
        if( $result !== false ){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $userId
     * @param $active
     * @return bool
     */
    public static function UpdateActive($userId, $active)
    {
        $result = DBO::Get()->Update(QueryUpdate::UserActive(), array('user_id'=>$userId,':active'=>$active));
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
    public static function Insert($params = array())
    {
        $userId = DBO::Get()->Insert(QueryInsert::User(), $params);
        if( $userId !== false){
            return true;
        }
        return false;
    }


    /**
     * @param $results
     * @return UserEntity[]|UserEntity|array
     */
    private static function GenerateEntities($results)
    {
        $objects = array();
        if( count($results) > 0) {
            foreach ($results as $row) {
                $objects[] = new UserEntity($row);
            }
        }
        return $objects;
    }

}