<?php

namespace Leisure\Library\Log;

use Leisure\Library\Common\Settings;
use Psr\Log\AbstractLogger;
use Psr\Log\NullLogger;

/**
 * Class Log
 * @package Leisure\Library\Log
 */
class Log extends AbstractLogger {

    /**
     * @var array
     */
    private static $logWeight = array(
        'emergency' =>  0,
        'alert'     =>  1,
        'critical'  =>  2,
        'error'     =>  3,
        'warning'   =>  4,
        'notice'    =>  5,
        'info'      =>  6,
        'debug'     =>  7
    );

    /**
     * @var null|Log
     */
    private static $instance = null;

    /**
     * @var bool
     */
    private static $systemInErrorStatus = false;

    /**
     * @return Log|null
     */
    public static function Get()
    {
        if( self::$instance instanceof Log)
        {
            return self::$instance;
        }
        else
        {
            /*
             * If an unrecoverable error (e.g. we cannot write to the file system) is
             * encountered, return an instance of NullLogger.  This is a logging object
             * that does not write to anything but is compatible with the Log class so
             * it doesn't blow up on Object not set to the instance of an object type
             * situations.
             */
            if( self::$systemInErrorStatus === true){
                error_log('System logger has encountered an unrecoverable error, please review system logs for more information');
                return new NullLogger();
            }
            self::$instance = new Log();
            return self::$instance;
        }
    }

    /**
     * @var resource
     */
    private $fileHandle;

    /**
     *
     */
    public function __construct()
    {
        $this->fileHandle = fopen(Settings::LOG_FILE, 'a+b');
        if( $this->fileHandle === false)
        {
            //keep us from entering into a infinite loop
            self::$systemInErrorStatus = true;
            error_log('IO error occurred trying to read/create the log file '. Settings::LOG_FILE);
        }
    }

    /**
     *
     */
    public function __destruct()
    {
        if( is_resource($this->fileHandle)){
            fclose($this->fileHandle);
        }
    }

    /**
     * @param string $level
     * @param string $message
     * @param array $context
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        //exit if logging level is not high enough for settings
        if( Log::$logWeight[strtolower($level)] > Log::$logWeight[strtolower(Settings::LOGGING_LEVEL)]) {
            return;
        }
        $timestamp = date('Y-m-d H:i:s');
        if( count($context) > 0 ){
            $message = $this->interpolate($message, $context);
        }
        $formatted = "[". $timestamp ."][". strtoupper($level) ."] ". $message ."\n";
        fwrite($this->fileHandle, $formatted);
    }

    /**
     * @param string $message
     * @param array $context
     * @return string
     */
    private function interpolate($message, array $context = array())
    {
        $replace = array();
        foreach ($context as $key => $val) {
            $replace['{' . $key . '}'] = $val;
        }
        return strtr($message, $replace);
    }

    /**
     * @param \Exception $exception
     */
    public function logException($exception)
    {
        $formatted = get_class($exception) . " caught at ". $exception->getFile() ." (". $exception->getLine() .")\n";
        $formatted .= "Message: ". $exception->getMessage() ."\n";
        $formatted .= $exception->getTraceAsString();
        $this->alert($formatted);
    }

    /**
     * Public interface for slim
     *
     * @param mixed $message
     */
    public function write($message)
    {
        $this->log(0, "SLIM:".$message);
    }

}