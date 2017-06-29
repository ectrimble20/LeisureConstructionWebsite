<?php

namespace Leisure\Application\Controller;

use Leisure\Application\Model\Service\ServiceFactory;
use Leisure\Application\View\ErrorView;
use Leisure\Application\View\UserView;
use Leisure\Library\Common\Audit;
use Leisure\Library\Log\Log;
use Leisure\Library\Session\Session;

/**
 * Class UserController
 * @package Leisure\Application\Controller
 */
class UserController extends Controller {

    /**
     * @return UserView
     */
    public function GET()
    {
        Log::Get()->debug(__METHOD__);
        //user GET accepts no arguments and is just a list display
        $this->params->Set('content', ServiceFactory::User($this->params)->Search());
        return new UserView($this->params);
    }

    /**
     * @return ErrorView|UserView
     */
    public function PUT()
    {
        Log::Get()->debug(__METHOD__);
        if( ! $this->params->HasValue('user_id')){
            return $this->throwError('Required parameter not set in request');
        }
        if( ServiceFactory::User($this->params)->Update() !== false){
            Audit::notice("User ID ". $this->params->Get('user_id') ." updated by user ". Session::GetSessionUser());
            $this->ResetParams();
            $this->params->Set('status_message','User Updated Successfully');
            $this->params->Set('message_alert_class','alert-success');
        } else {
            return $this->throwError("An error was encountered attempting to update the user");
        }
        return $this->GET();
    }

    /**
     * @return ErrorView|UserView
     */
    public function DELETE()
    {
        Log::Get()->debug(__METHOD__);
        if( ! $this->params->HasValue('user_id')){
            return $this->throwError('Required Parameter not set in request');
        }
        if( ServiceFactory::User($this->params)->Delete() !== false){
            Audit::notice("User ID ". $this->params->Get('user_id') ." deleted by user ". Session::GetSessionUser());
            $this->ResetParams();
            $this->params->Set('status_message','User Deleted Successfully');
            $this->params->Set('message_alert_class','alert-success');
        } else {
            return $this->throwError("An error was encountered attempting to delete the user");
        }
        return $this->GET();
    }

    /**
     * @return ErrorView|UserView
     */
    public function POST()
    {
        Log::Get()->debug(__METHOD__);
        if( ! $this->CheckRequired(array('username','password'))){
            return $this->throwError('Required Parameter not set in request');
        }
        if( ServiceFactory::User($this->params)->Store() !== false){
            Audit::notice("New user ". $this->params->Get('username') ." created by user ". Session::GetSessionUser());
            $this->ResetParams();
            $this->params->Set('status_message','User Created Successfully');
            $this->params->Set('message_alert_class','alert-success');
        } else {
            return $this->throwError("An error was encountered attempting to create the user");
        }
        return $this->GET();
    }

}