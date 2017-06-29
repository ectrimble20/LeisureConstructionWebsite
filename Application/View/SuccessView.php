<?php

namespace Leisure\Application\View;

class SuccessView extends View {

    protected function assemble()
    {
        $this->template->AddParameters(
            array(
                'title'=>'Success',
                'success_message'=>$this->params->Get('success_message')
            )
        );
        $this->template->AddSources(
            array(
                'header',
                'success',
                'footer'
            )
        );
    }

}