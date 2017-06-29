<?php

namespace Leisure\Application\Model\Service;

use Leisure\Library\Params\Params;

class ServiceFactory {

    public static function Index(Params $params)
    {
        return new IndexService($params);
    }

    public static function User(Params $params)
    {
        return new UserService($params);
    }

    public static function Image(Params $params)
    {
        return new ImageService($params);
    }

    public static function Audit(Params $params)
    {
        return new AuditService($params);
    }

    public static function About(Params $params)
    {
        return new AboutService($params);
    }

    public static function Endorse(Params $params)
    {
        return new EndorseService($params);
    }

}