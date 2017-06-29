<?php

namespace Leisure\Application\Model\Entity;

class ImageEntity extends Entity {

    //i.gallery_image_id, i.title, i.caption, i.record_date, i.image_guid, i.gallery_id, g.label, i.user_id, u.username, i.active
    protected $image_id;
    protected $title;
    protected $caption;
    protected $record_date;
    protected $image_guid;
    protected $gallery_id;
    protected $label;
    protected $user_id;
    protected $username;
    protected $active;

    /**
     * @return mixed
     */
    public function getImageId()
    {
        return $this->image_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getCaption()
    {
        return $this->caption;
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
    public function getImageGuid()
    {
        return $this->image_guid;
    }

    /**
     * @return mixed
     */
    public function getGalleryId()
    {
        return $this->gallery_id;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
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