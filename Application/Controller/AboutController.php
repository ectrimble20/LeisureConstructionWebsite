<?php

namespace Leisure\Application\Controller;

use Leisure\Application\Model\Service\ServiceFactory;
use Leisure\Application\View\AboutView;
use Leisure\Application\View\View;
use Leisure\Library\Common\Audit;
use Leisure\Library\Log\Log;
use Leisure\Library\Session\Session;

class AboutController extends Controller {

    public function GET()
    {
        Log::Get()->debug(__METHOD__);
        $aboutEntity = ServiceFactory::About($this->params)->GetCurrent();
        $this->params->Set('header',$aboutEntity->getHeader());
        $this->params->Set('lead_in',$aboutEntity->getLeadIn());
        $this->params->Set('body',$aboutEntity->getBody());
        $this->params->Set('update_user',$aboutEntity->getUsername());
        $this->params->Set('record_date',$aboutEntity->getRecordDate());
        $this->params->Set('username',Session::GetSessionUser());
        return new AboutView($this->params);
    }

    public function PUT()
    {
        Log::Get()->debug(__METHOD__);
        $this->throwError("Invalid Request Method");
    }

    public function DELETE()
    {
        Log::Get()->debug(__METHOD__);
        $this->throwError("Invalid Request Method");
    }

    public function POST()
    {
        Log::Get()->debug(__METHOD__);
        if( ! $this->CheckRequired(array('header','lead_in','body'))){
            return $this->throwError('Required Parameter not set in request');
        }
        $this->params->Set('user_id', Session::GetSessionUserId());
        if( ServiceFactory::About($this->params)->Update() !== false){
            Audit::notice("About updated by ". Session::GetSessionUser());
            $this->ResetParams();
            $this->params->Set('status_message','About Updated Successfully');
            $this->params->Set('message_alert_class','alert-success');
        } else {
            return $this->throwError("An error was encountered attempting to update the about content");
        }
        return $this->GET();
    }

}