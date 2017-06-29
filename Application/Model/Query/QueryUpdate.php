<?php

namespace Leisure\Application\Model\Query;

class QueryUpdate {

    public static function User()
    {
        return "UPDATE user set active = :active, password = :password, deleted = :deleted WHERE user_id = :user_id";
    }

    public static function UserActive()
    {
        return "UPDATE user SET active = :active WHERE user_id = :user_id";
    }

    public static function UserPassword()
    {
        return "UPDATE user SET password = SHA1(:password) WHERE user_id = :user_id";
    }

    public static function UserDelete()
    {
        return "UPDATE user SET deleted = 1 WHERE user_id = :user_id";
    }

    public static function ImageActive()
    {
        return "UPDATE image SET active = :active WHERE image_id = :image_id";
    }

    public static function ImageMeta()
    {
        return "UPDATE image SET title = :title, caption = :caption, gallery_id = :gallery_id WHERE image_id = :image_id";
    }

    public static function ImageDelete()
    {
        return "UPDATE image SET deleted = 1 WHERE image_id = :image_id";
    }

    public static function EndorseActive()
    {
        return "UPDATE endorse SET active = :active WHERE endorse_id = :endorse_id";
    }

    public static function EndorseDelete()
    {
        return "UPDATE endorse SET deleted = 1 WHERE endorse_id = :endorse_id";
    }

    public static function EndorseMeta()
    {
        return "UPDATE endorse SET body = :body, endorser = :endorser WHERE endorse_id = :endorse_id";
    }

}