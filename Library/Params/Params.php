<?php

namespace Leisure\Library\Params;

use Leisure\Library\Log\Log;

class Params {

    /**
     * Note this is loaded with two view parameters
     *
     * @var array
     */
    private $parameters = array(
        'status_message'    =>  '',
        'message_alert_class'   =>  'hidden'
    );

    public function __construct($inputParameters = array())
    {
        if( count($inputParameters) > 0)
        {
            foreach($inputParameters as $key => $value)
            {
                $this->Set($key, $value);
            }
        }
    }

    public function Get($key)
    {
        if( array_key_exists($key, $this->parameters))
        {
            return $this->parameters[$key];
        }
        else
        {
            return null;
        }
    }

    public function Set($key, $value)
    {
        if( strlen($value) === 0 || $value === '' )
        {
            $value = null;
        }
        $this->parameters[$key] = $value;
    }

    public function HasValue($key)
    {
        if( ! array_key_exists($key, $this->parameters))
        {
            return false;
        }
        if( is_null($this->parameters[$key]))
        {
            return false;
        }
        return true;
    }

    public function LogDebug()
    {
        foreach($this->parameters as $key => $value)
        {
            Log::Get()->debug("Params::Key[".$key."]".$value);
        }
    }

}