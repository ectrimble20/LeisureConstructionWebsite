<?php

namespace Leisure\Application\Model\Entity;

class AboutEntity extends Entity {

    //c.content_about_id, c.header, c.lead, c.body, c.record_date, c.user_id, u.username, c.active
    protected $about_id;
    protected $header;
    protected $lead_in;
    protected $body;
    protected $record_date;
    protected $user_id;
    protected $username;

    /**
     * @return mixed
     */
    public function getAboutId()
    {
        return $this->about_id;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return mixed
     */
    public function getLeadIn()
    {
        return $this->lead_in;
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

}