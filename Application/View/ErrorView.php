<?php

namespace Leisure\Application\View;

class ErrorView extends View {

    protected function assemble()
    {
        $this->template->AddParameters(
            array(
                'title'=>'Error Encountered',
                'error_message'=>$this->params->Get('error_message')
            )
        );
        $this->template->AddSources(
            array(
                'header',
                'error',
                'footer'
            )
        );
    }

}