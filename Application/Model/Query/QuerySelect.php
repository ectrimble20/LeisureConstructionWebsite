<?php

namespace Leisure\Application\Model\Query;

class QuerySelect extends Query {

    public static function Users()
    {
        return "SELECT ". Query::USER_FIELDS ." FROM user WHERE deleted = 0";
    }

    public static function UserById()
    {
        return "SELECT ". Query::USER_FIELDS ." FROM user WHERE deleted = 0 AND user_id = :user_id LIMIT 1";
    }

    public static function UserByLogin()
    {
        return "SELECT ". Query::USER_FIELDS ." FROM user WHERE deleted = 0 AND username = :username AND password = sha1(:password) LIMIT 1";
    }

    public static function Audit()
    {
        return "SELECT ". Query::AUDIT_FIELDS ." FROM audit a
        INNER JOIN audit_level al ON al.audit_level_id = a.audit_level_id
        ORDER BY a.record_date DESC";
    }

    public static function AuditBaseSearch()
    {
        return "SELECT ". Query::AUDIT_FIELDS ." FROM audit a
        INNER JOIN audit_level al ON al.audit_level_id = a.audit_level_id
        WHERE ";
    }

    public static function AuditByType()
    {
        return "SELECT ". Query::AUDIT_FIELDS ." FROM audit a
        INNER JOIN audit_level al ON al.audit_level_id = a.audit_level_id
        WHERE a.audit_level_id = :audit_level_id ORDER BY a.record_date DESC";
    }

    public static function AuditByDateRange()
    {
        return "SELECT ". Query::AUDIT_FIELDS ." FROM audit a
        INNER JOIN audit_level al ON al.audit_level_id = a.audit_level_id
        WHERE a.record_date BETWEEN :date_from AND :date_to ORDER BY a.record_date DESC";
    }

    public static function AuditByTypeAndDate()
    {
        return "SELECT ". Query::AUDIT_FIELDS ." FROM audit a
        INNER JOIN audit_level al ON al.audit_level_id = a.audit_level_id
        WHERE a.audit_level_id = :audit_level_id AND a.record_date BETWEEN :date_from AND :date_to ORDER BY a.record_date DESC";
    }

    public static function Images()
    {
        return "SELECT ". Query::IMAGE_FIELDS ." FROM image i
        INNER JOIN user u ON i.user_id = u.user_id
        INNER JOIN gallery g ON i.gallery_id = g.gallery_id
        WHERE i.deleted = 0";
    }

    public static function ImageById()
    {
        return "SELECT ". Query::IMAGE_FIELDS ." FROM image i
        INNER JOIN user u ON i.user_id = u.user_id
        INNER JOIN gallery g ON i.gallery_id = g.gallery_id
        WHERE i.image_id = :image_id";
    }

    public static function ImagesByGalleryId()
    {
        return "SELECT ". Query::IMAGE_FIELDS ." FROM image i
        INNER JOIN user u ON i.user_id = u.user_id
        INNER JOIN gallery g ON i.gallery_id = g.gallery_id
        WHERE i.gallery_id = :gallery_id AND i.deleted = 0";
    }

    public static function AboutCurrent()
    {
        return "SELECT ". Query::ABOUT_FIELDS ." FROM about a
        INNER JOIN user u ON a.user_id = u.user_id
        ORDER BY a.record_date DESC LIMIT 1";
    }

    public static function EndorseAll()
    {
        return "SELECT ". Query::ENDORSE_FIELDS ." FROM endorse e
        INNER JOIN user u on e.user_id = u.user_id
        WHERE e.deleted = 0";
    }

    public static function EndorserActive()
    {
        return "SELECT ". Query::ENDORSE_FIELDS ." FROM endorse e
        INNER JOIN user u on e.user_id = u.user_id
        WHERE e.deleted = 0 AND e.active = 1";
    }

    public static function EndorserById()
    {
        return "SELECT ". Query::ENDORSE_FIELDS ." FROM endorse e
        INNER JOIN user u on e.user_id = u.user_id
        WHERE e.endorse_id = :endorse_id";
    }

    public static function Gallery()
    {
        return "SELECT ". Query::GALLERY_FIELDS ." FROM gallery WHERE active = 1 ORDER BY gallery_id DESC";
    }

    public static function AuditLevel()
    {
        return "SELECT ". Query::AUDIT_LEVEL_FIELDS ." FROM audit_level ORDER BY audit_level_id DESC";
    }


}