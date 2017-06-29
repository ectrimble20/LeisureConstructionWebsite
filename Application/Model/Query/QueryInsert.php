<?php

namespace Leisure\Application\Model\Query;

class QueryInsert extends Query {

    public static function Audit()
    {
        return "INSERT INTO audit (". Query::INSERT_AUDIT .") VALUES (NULL, :action, NOW(), :audit_level_id)";
    }

    public static function User()
    {
        return "INSERT INTO user (". Query::INSERT_USER .") VALUES (NULL, :username, sha1(:password), 1, 0)";
    }

    public static function Image()
    {
        return "INSERT INTO image (". Query::INSERT_IMAGE .") VALUES (NULL, :title, :caption, NOW(), :image_guid, :gallery_id, :user_id, 0, 0)";
    }

    public static function About()
    {
        return "INSERT INTO about (". Query::INSERT_ABOUT .") VALUES (NULL, :header, :lead_in, :body, NOW(), :user_id)";
    }

    public static function Endorser()
    {
        return "INSERT INTO endorse (". Query::INSERT_ENDORSE .") VALUES (NULL, :body, :endorser, NOW(), :user_id, 1, 0)";
    }
}