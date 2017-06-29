<?php

namespace Leisure\Application\View;

class GalleryView extends View {

    protected function assemble()
    {
        $this->template->AddParameters(
            array(
                'gallery_title'=> $this->params->Get('gallery_title'),
                'content'   =>  $this->params->Get('content')
            )
        );
        $this->template->AddSources(
            array(
                'page_gallery'
            )
        );
    }

}