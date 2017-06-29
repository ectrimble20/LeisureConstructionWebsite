<?php

namespace Leisure\Application\Controller;

use Leisure\Application\Model\Entity\UserEntity;
use Leisure\Application\Model\Service\ServiceFactory;
use Leisure\Application\View\LoggedInView;
use Leisure\Application\View\LoginView;
use Leisure\Application\View\View;
use Leisure\Library\Common\Audit;
use Leisure\Library\Log\Log;
use Leisure\Library\Session\Session;

class LoginController extends Controller {

    protected $doNotValidate = true;

    public function GET()
    {
        Log::Get()->debug(__METHOD__);
        return new LoginView($this->params);
    }

    public function PUT()
    {
        return $this->throwError("Invalid Request Method");
    }

    public function DELETE()
    {
        return $this->throwError("Invalid Request Method");
    }

    public function POST()
    {
        Log::Get()->debug(__METHOD__);
        if( $this->CheckRequired(array('username','password')) === false){
            return $this->throwError("Required parameters missing");
        }
        $userEntity = ServiceFactory::User($this->params)->CheckLogin();
        Log::Get()->debug('User CheckLogin returned instance of '. get_class($userEntity));
        Log::Get()->debug('User ID: '. $userEntity->getUserId());
        if( $userEntity instanceof UserEntity && (int) $userEntity->getActive() === 1 && ! is_null($userEntity->getUsername()))
        {
            Session::SetSessionUser($userEntity->getUsername());
            Session::SetSessionUserId($userEntity->getUserId());
            Session::SetExpire();
            $this->params->Set('status_message','Login Successful, welcome '. $userEntity->getUsername());
            $this->params->Set('message_alert_class','alert-info');
            Audit::info("User ". Session::GetSessionUser() ." Logged In");
            return new LoggedInView($this->params);
        }
        else
        {
            Audit::alert("Failed login attempt by ". $this->params->Get('username'));
            $this->ResetParams();
            $this->params->Set('status_message','Login Failed');
            $this->params->Set('message_alert_class','alert-danger');
            return $this->GET();
        }
    }

}