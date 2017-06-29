<?php

namespace Leisure\Application\View;

class LoginView extends View {

    protected function assemble()
    {
        $this->template->AddParameter('title','Login');
        $this->template->AddSources(
            array(
                'header',
                'message_bar',
                'login',
                'footer'
            )
        );
    }

}