<?php

namespace Leisure\Application\View;

use Leisure\Library\Log\Log;
use Leisure\Library\Params\Params;
use Leisure\Library\Session\Session;
use Leisure\Library\Template\Template;

abstract class View {

    /**
     * @var Params
     */
    protected $params;

    /**
     * @var Template
     */
    protected $template;

    public function __construct(Params $params)
    {
        $this->params = $params;
        $this->template = new Template();
        $this->template->AddParameter('logged_in_user',Session::GetSessionUser());
        $this->template->AddParameter('status_message',$this->params->Get('status_message'));
        $this->template->AddParameter('message_alert_class',$this->params->Get('message_alert_class'));
        $this->assemble();
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->template->render();
    }

    abstract protected function assemble();

}