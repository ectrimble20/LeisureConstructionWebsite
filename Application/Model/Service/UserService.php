<?php

namespace Leisure\Application\Model\Service;

use Leisure\Application\Model\Mapper\UserMapper;
use Leisure\Library\Template\Component;

class UserService extends Service {

    public function Search()
    {
        //user doesn't use a search feature, so we'll simply build our list
        $userList = UserMapper::GetAll();
        $html = "";
        if( count($userList) > 0){
            foreach($userList as $userEntity)
            {
                $html .= Component::UserTR($userEntity->getUserId(), $userEntity->getUsername(), $userEntity->getActive());
            }
        } else {
            $html = "<tr><td colspan='4' align='center'>No Results</td></tr>";
        }
        return $html;
    }

    /**
     * @return \Leisure\Application\Model\Entity\UserEntity
     */
    public function CheckLogin()
    {
        return UserMapper::FindByLogin($this->params->Get('username'),$this->params->Get('password'));
    }

    public function Update()
    {
        if( $this->params->HasValue('password')){
            return UserMapper::UpdatePassword($this->params->Get('user_id'),$this->params->Get('password'));
        } elseif($this->params->HasValue('active')){
            return UserMapper::UpdateActive($this->params->Get('user_id'),$this->params->Get('active'));
        } else {
            return false;
        }
    }

    public function Store()
    {
        $params = array(
            ':username'=>$this->params->Get('username'),
            ':password'=>$this->params->Get('password')
        );
        $check = UserMapper::Insert($params);
        if( $check !== false){
            return true;
        }
        return false;
    }

    public function Delete()
    {
        return UserMapper::Delete($this->params->Get('user_id'));
    }

}