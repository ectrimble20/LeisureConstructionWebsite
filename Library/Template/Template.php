<?php

namespace Leisure\Library\Template;

use Leisure\Library\Common\Settings;
use Leisure\Library\Configuration\Config;
use Leisure\Library\Log\Log;

class Template {

    private $sources = array();
    private $params = array();

    public function AddParameter($key, $value = '')
    {
        $this->params[$key] = $value;
        Log::Get()->debug("Template::Var::".$key);
    }

    public function AddParameters($params = array())
    {
        foreach($params as $key => $value)
        {
            $this->AddParameter($key, $value);
        }
    }

    public function AddSource($page)
    {
        $this->sources[] = $page;
        Log::Get()->debug("Template::Src::".$page);
    }

    public function AddSources($pages = array())
    {
        foreach($pages as $page)
        {
            $this->AddSource($page);
        }
    }

    public function render()
    {
        extract($this->params);
        ob_start();
        foreach($this->sources as $fileName)
        {
            $fullPath = Settings::TEMPLATE_DIR . $fileName .".php";
            if( file_exists($fullPath)){
                include $fullPath;
            } else {
                Log::Get()->alert("Template Error:  could not load ". $fileName ." from templates");
            }
        }
        $buffer = ob_get_contents();
        @ob_end_clean();
        return $buffer;
    }

    public static function injectComponent($params = array(), $component)
    {
        extract($params);
        ob_start();
        $fullPath = Settings::TEMPLATE_COMPONENT_DIR . $component .".php";
        if( file_exists($fullPath)) {
            include $fullPath;
        } else {
            Log::Get()->alert("Template Component Error: could not load file ". $component ." from template components");
        }
        $buffer = ob_get_contents();
        @ob_end_clean();
        return $buffer;
    }

}