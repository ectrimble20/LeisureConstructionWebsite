<?php

namespace Leisure\Application\Model\Entity;

class UserEntity extends Entity
{

    protected $user_id;
    protected $username;
    protected $password;
    protected $active;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }


}