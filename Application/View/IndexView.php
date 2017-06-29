<?php

namespace Leisure\Application\View;

class IndexView extends View {

    protected function assemble()
    {
        $this->template->AddParameters(
            array(
                'gallery_main_screen_content'=>$this->params->Get('gallery_main_screen_content'),
                'gallery_residential_content'=>$this->params->Get('gallery_residential_content'),
                'gallery_commercial_content'=>$this->params->Get('gallery_commercial_content'),
                'endorser_content'=>$this->params->Get('endorser_content'),
                'about_header'=>$this->params->Get('about_header'),
                'about_lead_in'=>$this->params->Get('about_lead_in'),
                'about_body'=>$this->params->Get('about_body')
            )
        );
        $this->template->AddSource('home');
    }

    /*
     * Fields I need:
     *
     * $gallery_main_screen_content
     * $endorser_content
     * $about_header
     * $about_lead_in
     * $about_body
     *
     * To Consider, should we add editable options for mission/vision? Discuss with Leslie
     */

}