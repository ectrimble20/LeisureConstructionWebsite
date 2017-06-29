<?php

namespace Leisure\Application\Model\Service;

use Leisure\Application\Model\Mapper\AboutMapper;

class AboutService extends Service {

    public function GetCurrent()
    {
        return AboutMapper::GetCurrentActive();
    }

    public function Update()
    {
        $params = array(
            ':user_id'=>$this->params->Get('user_id'),
            ':header'=>$this->params->Get('header'),
            ':lead_in'=>$this->params->Get('lead_in'),
            ':body'=>$this->params->Get('body')
        );
        return AboutMapper::Create($params);
    }

}