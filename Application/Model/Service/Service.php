<?php

namespace Leisure\Application\Model\Service;

use Leisure\Library\Params\Params;

abstract class Service {

    /**
     * @var Params
     */
    protected $params;

    public function __construct(Params $params)
    {
        $this->params = $params;
    }

}