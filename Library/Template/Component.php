<?php

namespace Leisure\Library\Template;

use Leisure\Library\Common\Settings;

class Component
{
    /**
     * @param $user_id
     * @param $username
     * @param $active
     * @return string
     */
    public static function UserTR($user_id, $username, $active)
    {
        $action_text = "Deactivate";
        $glyphicon = "glyphicon-ok";
        if( (int) $active === 0 ) {
            $action_text = "Reactivate";
            $glyphicon = "glyphicon-remove";
        }

        $params = array(
            'username'=>$username,
            'user_id'=>$user_id,
            'title_text'=>$action_text,
            'glyphicon'=>$glyphicon,
            'active'=>(int) !$active,
            'action_text' => $action_text
        );
        return Template::injectComponent($params,'tr_user');
    }

    /**
     * @param $image_id
     * @param $title
     * @param $caption
     * @param $record_date
     * @param $gallery_label
     * @param $active
     * @return string
     */
    public static function ImageTR($image_id, $title, $caption, $record_date, $gallery_label, $active)
    {
        $title_text = "Deactivate";
        $glyphicon = "glyphicon-ok";
        if( (int) $active === 0 ) {
            $title_text = "Reactivate";
            $glyphicon = "glyphicon-remove";
        }

        $params = array(
            'image_id'=>$image_id,
            'title'=>$title,
            'caption'=>$caption,
            'record_date'=>$record_date,
            'gallery_label'=>$gallery_label,
            'title_text'=>$title_text,
            'active'=> (int) !$active,
            'glyphicon'=>$glyphicon
        );
        return Template::injectComponent($params, 'tr_image');
    }

    /**
     * @param $date
     * @param $action
     * @param $level
     * @return string
     */
    public static function AuditLogTR($date, $action, $level)
    {
        $levelMap = array(
            '1' =>  array('bg-success','Information','glyphicon-ok-sign'),
            '2' =>  array('bg-info','Notice','glyphicon-info-sign'),
            '3' =>  array('bg-warning','Alert','glyphicon-exclamation-sign'),
            '4' =>  array('bg-danger','Critical','glyphicon-fire')
        );
        list($level_class, $level_text, $glyphicon) = $levelMap[$level];
        $params = array(
            'date'=>$date,
            'action'=>$action,
            'level_class'=>$level_class,
            'level_text'=>$level_text,
            'glyphicon'=>$glyphicon
        );
        return Template::injectComponent($params, 'tr_audit_log');
    }

    /**
     * @param $endorse_id
     * @param $endorser
     * @param $body
     * @param $record_date
     * @param $username
     * @param $active
     * @return string
     */
    public static function EndorserTR($endorse_id, $endorser, $body, $record_date, $username, $active) {
        $title_text = "Deactivate";
        $glyphicon = "glyphicon-ok";
        if( (int) $active === 0 ) {
            $title_text = "Reactivate";
            $glyphicon = "glyphicon-remove";
        }
        $params = array(
            'endorse_id'=>$endorse_id,
            'endorser'=>$endorser,
            'body'=>$body,
            'record_date'=>$record_date,
            'username'=>$username,
            'title_text'=>$title_text,
            'glyphicon'=>$glyphicon,
            'active'=> (int) !$active
        );
        return Template::injectComponent($params,'tr_endorse');
    }

    public static function MainScreenGalleryItem($image_guid, $title, $caption, $is_active = false)
    {
        if( $is_active === true){
            $active_class = "active";
        } else {
            $active_class = "";
        }
        $params = array(
            'image_path' => Settings::IMAGE_DISPLAY_DIR . $image_guid,
            'title'=>$title,
            'caption'=>$caption,
            'active_item'=>$active_class
        );
        return Template::injectComponent($params, 'item_main_gallery');
    }

    public static function MainScreenEndorseItem($body, $endorser, $is_active = false)
    {
        if( $is_active === true){
            $active_class = "active";
        } else {
            $active_class = "";
        }
        $params = array(
            'body'=>$body,
            'endorser'=>$endorser,
            'active_item'=>$active_class
        );
        return Template::injectComponent($params, 'item_endorse');
    }

}
