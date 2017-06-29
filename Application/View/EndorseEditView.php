<?php

namespace Leisure\Application\View;

class EndorseEditView extends View {

    protected function assemble()
    {
        $this->template->AddParameters(
            array(
                'title' =>  'Edit Endorsement',
                'message_alert_class'   =>  $this->params->Get('message_alert_class'),
                'status_message'    =>  $this->params->Get('status_message'),
                'endorse_id'=>$this->params->Get('endorse_id'),
                'body'=>$this->params->Get('body'),
                'endorser'=>$this->params->Get('endorser'),
                'create_user'=>$this->params->Get('create_user'),
                'create_date'=>$this->params->Get('create_date')
            )
        );
        $this->template->AddSources(
            array(
                'header',
                'navbar',
                'message_bar',
                'edit_endorse',
                'footer'
            )
        );
    }

}