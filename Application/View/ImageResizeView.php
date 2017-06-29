<?php

namespace Leisure\Application\View;

use Leisure\Library\Common\Settings;

class ImageResizeView extends View {

    protected function assemble()
    {
        if( $this->params->Get('image_preview') == 0){
            $hidden = 'hidden';
        } else {
            $hidden = '';
        }

        $this->template->AddParameters(
            array(
                'title' =>  'Image List',
                'message_alert_class'   =>  $this->params->Get('message_alert_class'),
                'status_message'    =>  $this->params->Get('status_message'),
                'image_id'  =>  $this->params->Get('image_id'),
                'image_guid'    =>  $this->params->Get('image_guid'),
                'image_width'   =>  $this->params->Get('image_width'),
                'image_height'   =>  $this->params->Get('image_height'),
                'image_preview' => $this->params->Get('image_preview'),
                'image_path_full' => Settings::IMAGE_DISPLAY_DIR . $this->params->Get('image_guid'),
                'hide_save' => $hidden
            )
        );

        $this->template->AddSources(
            array(
                'header',
                'navbar',
                'message_bar',
                'edit_image_resize',
                'footer'
            )
        );
    }

}