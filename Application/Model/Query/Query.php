<?php

namespace Leisure\Application\Model\Query;

abstract class Query {
    //select
    const GALLERY_FIELDS = "gallery_id, label, active";
    const AUDIT_LEVEL_FIELDS = "audit_level_id, level";
    const USER_FIELDS = "user_id, username, password, active";
    const AUDIT_FIELDS = "a.audit_id, a.action, a.record_date, a.audit_level_id, al.level";
    const IMAGE_FIELDS = "i.image_id, i.title, i.caption, i.record_date, i.image_guid, i.gallery_id, g.label, i.user_id, u.username, i.active";
    const ABOUT_FIELDS = "a.about_id, a.header, a.lead_in, a.body, a.record_date, a.user_id, u.username";
    const ENDORSE_FIELDS = "e.endorse_id, e.body, e.endorser, e.record_date, e.user_id, u.username, e.active";
    //insert
    const INSERT_AUDIT = "audit_id, action, record_date, audit_level_id";
    const INSERT_IMAGE = "image_id, title, caption, record_date, image_guid, gallery_id, user_id, active, deleted";
    const INSERT_USER = "user_id, username, password, active, deleted";
    const INSERT_ABOUT = "about_id, header, lead_in, body, record_date, user_id";
    const INSERT_ENDORSE = "endorse_id, body, endorser, record_date, user_id, active, deleted";

    public static function SelectUser()
    {
        return "SELECT ". self::USER_FIELDS ." FROM user";
    }

}