<?php

namespace Leisure\Application\Model\Entity;

class EndorseEntity extends Entity {

    //c.content_customers_say_id, c.body, c.endorser, c.record_date, c.user_id, u.username, c.active
    protected $endorse_id;
    protected $body;
    protected $endorser;
    protected $record_date;
    protected $user_id;
    protected $username;
    protected $active;


    /**
     * @return mixed
     */
    public function getEndorseId()
    {
        return $this->endorse_id;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getEndorser()
    {
        return $this->endorser;
    }

    /**
     * @return mixed
     */
    public function getRecordDate()
    {
        return $this->record_date;
    }

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
    public function getActive()
    {
        return $this->active;
    }



}