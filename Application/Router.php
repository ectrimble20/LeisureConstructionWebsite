<?php

namespace Leisure\Application;


use Leisure\Application\Controller\ControllerFactory;
use Leisure\Library\Common\Audit;
use Leisure\Library\Log\Log;
use Leisure\Library\Session\Session;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Container;

class Router {

    public static function Initialize()
    {
        Log::Get()->debug("Initializing Router");
        $instance = new Router();
        Log::Get()->debug("Initializing Routes");
        $instance->initializeRoutes();
        Log::Get()->debug("Executing Router");
        $instance->execute();
        Log::Get()->debug("Execution Complete");
    }

    /**
     * @var App
     */
    private $app;

    public function __construct()
    {
        $config = [
            'settings'  =>  [
                'displayErrorDetails'   =>  true,
            ],
        ];
        $c = new Container($config);
        $this->app = new App($c);
    }

    private function initializeRoutes()
    {
        Session::Start();
        //Index Route
        $this->app->get('/', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Index($request, $response, $args)->Execute();
        });
        $this->app->post('/', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Index($request, $response, $args)->Execute();
        });
        $this->app->get('/gallery/{gallery_id}', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Gallery($request,$response,$args)->Execute();
        });

        //GET ROUTES
        $this->app->get('/logout', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            Audit::info("User ". Session::GetSessionUser() ." Logged out");
            Session::Destroy();
            $response = $response->withStatus(301)->withHeader('Location','/');
            return $response;
        });
        $this->app->get('/login', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Login($request, $response, $args)->Execute();
        });
        $this->app->get('/user', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::User($request,$response,$args)->Execute();
        });
        $this->app->get('/image[/{image_id}]', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Image($request,$response,$args)->Execute();
        });
        $this->app->get('/audit', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Audit($request,$response,$args)->Execute();
        });
        $this->app->get('/about', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::About($request,$response,$args)->Execute();
        });
        $this->app->get('/endorse[/{endorse_id}]', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Endorse($request,$response,$args)->Execute();
        });
        $this->app->get('/resize/{image_id}', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Resize($request,$response,$args)->Execute();
        });

        //POST ROUTES
        $this->app->post('/login', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Login($request, $response, $args)->Execute();
        });
        $this->app->post('/image', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Image($request,$response,$args)->Execute();
        });
        $this->app->post('/user', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::User($request,$response,$args)->Execute();
        });
        $this->app->post('/about', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::About($request,$response,$args)->Execute();
        });
        $this->app->post('/endorse', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Endorse($request,$response,$args)->Execute();
        });

        //PUT ROUTES
        $this->app->put('/image/{image_id}', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Image($request,$response,$args)->Execute();
        });
        $this->app->put('/user/{user_id}', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::User($request,$response,$args)->Execute();
        });
        $this->app->put('/endorse/{endorse_id}', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Endorse($request,$response,$args)->Execute();
        });
        $this->app->put('/resize/{image_id}', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Resize($request,$response,$args)->Execute();
        });

        //DELETE ROUTES
        $this->app->delete('/image/{image_id}', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Image($request,$response,$args)->Execute();
        });
        $this->app->delete('/user/{user_id}', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::User($request,$response,$args)->Execute();
        });
        $this->app->delete('/endorse/{endorse_id}', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Endorse($request,$response,$args)->Execute();
        });

        /*
        $this->app->get('/login', function(ServerRequestInterface $request, ResponseInterface $response, $args){
            return ControllerFactory::Login($request, $response, $args)->Execute();
        });
        */
    }

    private function execute()
    {
        $this->app->run();
    }

}

