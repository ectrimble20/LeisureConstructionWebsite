<?php

namespace Leisure\Application\Model\Entity;

use Leisure\Library\Log\Log;

abstract class Entity {

    public function __construct($input = array())
    {
        $vars = get_object_vars($this);
        if( is_array($input) && count($input) > 0) {
            foreach ($input as $key => $value) {
                if (array_key_exists($key, $vars)) {
                    $this->{$key} = $value;
                }
            }
        }
    }

}