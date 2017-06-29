<?php

namespace Leisure\Application\Model\Entity;

class AuditEntity extends Entity {

    //a.audit_id, a.action, a.record_date, a.audit_level_id, al.level
    protected $audit_id;
    protected $action;
    protected $record_date;
    protected $audit_level_id;
    protected $level;

    /**
     * @return mixed
     */
    public function getAuditId()
    {
        return $this->audit_id;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getRecordDate()
    {
        return $this->record_date;
    }

    /**
     * @return mixed
     */
    public function getAuditLevelId()
    {
        return $this->audit_level_id;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }


}