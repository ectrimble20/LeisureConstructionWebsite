<?php

namespace Leisure\Application\Model\Value;

abstract class Value {

    public function __construct($loadParameters = array())
    {
        if( count($loadParameters) > 0)
        {
            foreach($loadParameters as $key => $value)
            {
                if( property_exists($this, $key))
                {
                    $this->{$key} = $value;
                }
            }
        }
    }

    /**
     * @return array
     */
    public function GetQueryParams()
    {
        $keys = get_class_vars($this);
        $params = array();
        foreach($keys as $key)
        {
            if( strlen($this->{$key}) > 0 )
            {
                $params[$key] = $this->{$key};
            }
        }
        return $params;
    }

}