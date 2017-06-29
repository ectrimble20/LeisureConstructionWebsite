<?php

namespace Leisure\Application\View;

class AboutView extends View {

    protected function assemble()
    {
        $this->template->AddParameters(
            array(
                'title' =>  'About Us',
                'message_alert_class'   =>  $this->params->Get('message_alert_class'),
                'status_message'    =>  $this->params->Get('status_message'),
                'header'=>$this->params->Get('header'),
                'lead_in'=>$this->params->Get('lead_in'),
                'body'=>$this->params->Get('body'),
                'update_user'=>$this->params->Get('update_user'),
                'record_date'=>$this->params->Get('record_date')
            )
        );
        $this->template->AddSources(
            array(
                'header',
                'navbar',
                'message_bar',
                'edit_about',
                'footer'
            )
        );
    }

}