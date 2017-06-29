<?php

namespace Leisure\Application\Model\Service;

use Leisure\Application\Model\Mapper\EndorseMapper;
use Leisure\Library\Log\Log;
use Leisure\Library\Session\Session;
use Leisure\Library\Template\Component;

class EndorseService extends Service {

    /**
     * @return \Leisure\Application\Model\Entity\EndorseEntity
     */
    public function GetById()
    {
        return EndorseMapper::GetById($this->params->Get('endorse_id'));
    }

    public function GetList()
    {
        $endorseList = EndorseMapper::GetList();
        $html = "";
        if( count($endorseList) > 0){
            foreach($endorseList as $endorseEntity)
            {
                $html .= Component::EndorserTR(
                    $endorseEntity->getEndorseId(), $endorseEntity->getEndorser(), $endorseEntity->getBody(),
                    $endorseEntity->getRecordDate(), $endorseEntity->getUsername(), $endorseEntity->getActive()
                );
            }
        } else {
            $html = "<tr><td colspan='7' align='center'>No Results</td></tr>";
        }
        return $html;
    }

    public function Update()
    {
        Log::Get()->debug("running update on endorse");
        if( $this->params->HasValue('active')){
            Log::Get()->debug("Found active, setting active to ". $this->params->Get('active'));
            return EndorseMapper::UpdateActive($this->params->Get('endorse_id'),$this->params->Get('active'));
        } elseif($this->params->HasValue('body') && $this->params->HasValue('endorser')) {
            return EndorseMapper::UpdateMeta($this->params->Get('endorse_id'),$this->params->Get('body'),$this->params->Get('endorser'));
        } else {
            return false;
        }
    }

    public function Store()
    {
        $params = array(
            ':body'=>$this->params->Get('body'),
            ':endorser'=>$this->params->Get('endorser'),
            ':user_id'=>Session::GetSessionUserId()
        );
        return EndorseMapper::Create($params);
    }

    public function Delete()
    {
        return EndorseMapper::Delete($this->params->Get('endorse_id'));
    }

}