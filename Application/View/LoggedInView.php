<?php

namespace Leisure\Application\View;

class LoggedInView extends View {

    protected function assemble()
    {
        $this->template->AddParameter('title','Login');
        $this->template->AddSources(
            array(
                'header',
                'navbar',
                'message_bar',
                'footer'
            )
        );
    }

}