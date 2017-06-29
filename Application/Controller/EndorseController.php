<?php

namespace Leisure\Application\Controller;

use Leisure\Application\Model\Service\ServiceFactory;
use Leisure\Application\View\EndorseEditView;
use Leisure\Application\View\EndorseView;
use Leisure\Application\View\View;
use Leisure\Library\Common\Audit;
use Leisure\Library\Log\Log;
use Leisure\Library\Session\Session;

class EndorseController extends Controller {

    public function GET()
    {
        Log::Get()->debug(__METHOD__);
        if( $this->params->HasValue('endorse_id')){
            $entity = ServiceFactory::Endorse($this->params)->GetById();
            $this->params->Set('body',$entity->getBody());
            $this->params->Set('endorser',$entity->getEndorser());
            $this->params->Set('create_user',$entity->getUsername());
            $this->params->Set('create_date',$entity->getRecordDate());
            return new EndorseEditView($this->params);
        } else {
            $this->params->Set('content', ServiceFactory::Endorse($this->params)->GetList());
            return new EndorseView($this->params);
        }
    }

    public function PUT()
    {
        Log::Get()->debug(__METHOD__);
        if( ! $this->params->HasValue('endorse_id')){
            return $this->throwError('Required parameter not set in request');
        }
        if( ServiceFactory::Endorse($this->params)->Update() !== false){
            Audit::notice("Endorsement ID ". $this->params->Get('endorse_id') ." updated by user ". Session::GetSessionUser());
            $this->ResetParams();
            $this->params->Set('status_message','Endorsement updated Successfully');
            $this->params->Set('message_alert_class','alert-success');
        } else {
            return $this->throwError("An error was encountered attempting to update the endorsement");
        }
        return $this->GET();
    }

    public function DELETE()
    {
        Log::Get()->debug(__METHOD__);
        if( ! $this->params->HasValue('endorse_id')){
            return $this->throwError('Required parameter not set in request');
        }
        if( ServiceFactory::Endorse($this->params)->Delete() !== false){
            Audit::notice("Endorsement ID ". $this->params->Get('endorse_id') ." deleted by user ". Session::GetSessionUser());
            $this->ResetParams();
            $this->params->Set('status_message','Endorsement deleted Successfully');
            $this->params->Set('message_alert_class','alert-success');
        } else {
            return $this->throwError("An error was encountered attempting to delete the endorsement");
        }
        return $this->GET();
    }

    public function POST()
    {
        Log::Get()->debug(__METHOD__);
        if( ! $this->CheckRequired(array('body','endorser'))){
            return $this->throwError('Required parameter not set in request');
        }
        $this->params->Set('user_id', Session::GetSessionUserId());
        if( ServiceFactory::Endorse($this->params)->Store() !== false){
            Audit::notice("New endorsement created by user ". Session::GetSessionUser());
            $this->ResetParams();
            $this->params->Set('status_message','Endorsement Created Successfully');
            $this->params->Set('message_alert_class','alert-success');
        } else {
            return $this->throwError("An error was encountered attempting to create the endorsement");
        }
        return $this->GET();
    }

}