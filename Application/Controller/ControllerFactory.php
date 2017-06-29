<?php

namespace Leisure\Application\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ControllerFactory {

    public static function Index(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return new IndexController($request, $response, $args);
    }

    public static function Login(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return new LoginController($request, $response, $args);
    }

    public static function Audit(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return new AuditController($request, $response, $args);
    }

    public static function User(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return new UserController($request, $response, $args);
    }

    public static function Endorse(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return new EndorseController($request, $response, $args);
    }

    public static function About(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return new AboutController($request, $response, $args);
    }

    public static function Image(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return new ImageController($request, $response, $args);
    }

    public static function Resize(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return new ResizeController($request, $response, $args);
    }

    public static function Gallery(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return new GalleryController($request, $response, $args);
    }

}