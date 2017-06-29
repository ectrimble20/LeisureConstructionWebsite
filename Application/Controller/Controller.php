<?php

namespace Leisure\Application\Controller;

use Leisure\Application\View\ErrorView;
use Leisure\Library\Common\Audit;
use Leisure\Library\Log\Log;
use Leisure\Library\Params\Params;
use Leisure\Library\Session\Session;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Leisure\Application\View\View;

abstract class Controller {
    /**
     * @var ServerRequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var Params
     */
    protected $params;

    /**
     * @var string
     */
    protected $executionMethod;

    /**
     * @var bool
     */
    protected $doNotValidate = false;

    /**
     * @var bool
     */
    protected $stopErrorEncountered = false;

    public function __construct(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        $this->request = $request;
        $this->response = $response;
        $this->ValidateSession();
        Log::Get()->debug("Controller construct called");
        Log::Get()->debug("Method is: ". $this->request->getMethod());
        if( $request->getMethod() === 'GET')
        {
            $input = $this->request->getQueryParams();
        } else {
            $input = $this->request->getParsedBody();
        }
        $this->params = new Params($input);
        //only load from args if it's set as an array
        if( is_array($args))
        {
            foreach($args as $key => $value)
            {
                $this->params->Set($key, $value);
            }
        }
        $this->params->LogDebug();
    }

    protected function ResetParams()
    {
        $this->params = new Params();
    }

    protected function CheckRequired($fields = array())
    {
        foreach($fields as $key)
        {
            if( ! $this->params->HasValue($key)){
                return false;
            }
        }
        return true;
    }

    /**
     * @param $errorMessage
     * @return ErrorView
     */
    protected function throwError($errorMessage)
    {
        Log::Get()->debug(__METHOD__);
        $this->params->Set('error_message',$errorMessage);
        Audit::alert("Non-fatal system error: ". $errorMessage);
        return new ErrorView($this->params);
    }

    protected function redirectTo($uri)
    {
        $this->response = $this->response->withStatus(301)->withHeader('Location',$uri);
    }

    protected function ValidateSession()
    {
        if( $this->doNotValidate === false ) {
            Log::Get()->debug("ValidateSession initialized");
            if (Session::ValidSession() === false) {
                Audit::info("User ". Session::GetSessionUser() ." session has expired, new login required");
                Log::Get()->debug("Session is not valid, redirecting to login");
                Session::Destroy();
                $this->response = $this->response->withStatus(301)->withHeader('Location', '/login');
            } else {
                Log::Get()->debug("Session is valid for user ". Session::GetSessionUser());
                Session::SetExpire();
            }
        }
    }

    public function Execute()
    {
        Log::Get()->debug(__METHOD__);
        switch($this->request->getMethod())
        {
            case 'GET':
                $view = $this->GET();
                break;
            case 'POST':
                $view = $this->POST();
                break;
            case 'PUT':
                $view = $this->PUT();
                break;
            case 'DELETE':
                $view = $this->DELETE();
                break;
            default:
                $view = $this->throwError("Invalid Request Method");
        }
        $resp = $this->response->getBody();
        $resp->write($view->render());
        $this->response = $this->response->withStatus(200);
        $this->response = $this->response->withBody($resp);
        return $this->response;
    }

    /**
     * @return View
     */
    abstract public function GET();

    /**
     * @return View
     */
    abstract public function PUT();

    /**
     * @return View
     */
    abstract public function DELETE();

    /**
     * @return View
     */
    abstract public function POST();

}