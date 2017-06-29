<?php

namespace Leisure\Application\View;

use Leisure\Library\Common\Settings;

class ImageEditView extends View {

    protected function assemble()
    {
        $this->template->AddParameters(
            array(
                'title' =>  'Image List',
                'message_alert_class'   =>  $this->params->Get('message_alert_class'),
                'status_message'    =>  $this->params->Get('status_message'),
                'image_id'  =>  $this->params->Get('image_id'),
                'img_title'   =>  $this->params->Get('img_title'),
                'caption'   =>  $this->params->Get('caption'),
                'record_date'   =>  $this->params->Get('record_date'),
                'image_user'    =>  $this->params->Get('image_user'),
                'image_path_full' => Settings::IMAGE_DISPLAY_DIR . $this->params->Get('image_guid'),
                'image_path_thumb' => Settings::IMAGE_THUMB_DISPLAY_DIR . $this->params->Get('image_guid'),
                'image_size_height'=>100, //TODO fix these
                'image_size_width'=>100
            )
        );
        $c_sel = "";
        $r_sel = "";
        $m_sel = "";
        switch($this->params->Get('gallery_id')){
            case '1':
                $c_sel = "SELECTED";
                break;
            case '2':
                $r_sel = "SELECTED";
                break;
            case '3':
                $m_sel = "SELECTED";
                break;
            default:
                $c_sel = "SELECTED";
        }

        $this->template->AddParameters(
            array(
                'c_selected'=>$c_sel,
                'r_selected'=>$r_sel,
                'm_selected'=>$m_sel
            )
        );

        $this->template->AddSources(
            array(
                'header',
                'navbar',
                'message_bar',
                'edit_image',
                'modal_view_image',
                'modal_resize_image',
                'footer'
            )
        );
    }

}