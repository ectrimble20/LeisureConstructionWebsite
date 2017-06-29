<?php

namespace Leisure\Application\View;

class AuditView extends View {

    protected function assemble()
    {
        $this->template->AddParameters(
            array(
                'title' =>  'Audit Log List',
                'message_alert_class'   =>  $this->params->Get('message_alert_class'),
                'status_message'    =>  $this->params->Get('status_message'),
                'content'   =>  $this->params->Get('content')
            )
        );
        $this->template->AddSources(
            array(
                'header',
                'navbar',
                'message_bar',
                'list_audit_log',
                'modal_audit_log',
                'footer'
            )
        );
    }

}