<?php

namespace Leisure\Application\Model\Service;

use Leisure\Application\Model\Mapper\AuditMapper;
use Leisure\Application\Model\Mapper\UserMapper;
use Leisure\Library\Template\Component;

class AuditService extends Service {

    public function Search()
    {
        if( $this->params->HasValue('search_for')){
            $auditList = AuditMapper::Search($this->params->Get('search_for'));
        } else {
            if( $this->params->HasValue('audit_level_id')) {
                if( $this->params->HasValue('date_from') && $this->params->HasValue('date_to')) {
                    $auditList = AuditMapper::FilterByTypeAndDateRange(
                        $this->params->Get('audit_level_id'), $this->params->Get('date_from'),
                        $this->params->Get('date_to')
                    );
                } else {
                    $auditList = AuditMapper::FilterByType($this->params->Get('audit_level_id'));
                }
            } else {
                if( $this->params->HasValue('date_from') && $this->params->HasValue('date_to')) {
                    $auditList = AuditMapper::FilterByDateRange($this->params->Get('date_from'),
                        $this->params->Get('date_to'));
                } else {
                    $auditList = AuditMapper::GetList();
                }
            }
        }
        $html = "";
        if( count($auditList) > 0){
            foreach($auditList as $auditEntity)
            {
                $html .= Component::AuditLogTR($auditEntity->getRecordDate(), $auditEntity->getAction(), $auditEntity->getAuditLevelId());
            }
        } else {
            $html = "<tr><td colspan='3' align='center'>No Results</td></tr>";
        }
        return $html;
    }

}