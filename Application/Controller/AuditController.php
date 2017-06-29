<?php

namespace Leisure\Application\Controller;

use Leisure\Application\Model\Service\ServiceFactory;
use Leisure\Application\View\AuditView;
use Leisure\Application\View\ErrorView;
use Leisure\Library\Log\Log;

/**
 * Class AuditController
 * @package Leisure\Application\Controller
 */
class AuditController extends Controller {

    /**
     * @return AuditView
     */
    public function GET()
    {
        Log::Get()->debug(__METHOD__);
        //user GET accepts no arguments and is just a list display
        $this->params->Set('content', ServiceFactory::Audit($this->params)->Search());
        return new AuditView($this->params);
    }

    /**
     * @return ErrorView
     */
    public function PUT()
    {
        Log::Get()->debug(__METHOD__);
        return $this->throwError("Invalid Request Method");
    }

    /**
     * @return ErrorView
     */
    public function DELETE()
    {
        Log::Get()->debug(__METHOD__);
        return $this->throwError("Invalid Request Method");
    }

    /**
     * @return ErrorView
     */
    public function POST()
    {
        Log::Get()->debug(__METHOD__);
        return $this->throwError("Invalid Request Method");
    }

}