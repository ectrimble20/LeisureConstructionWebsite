<?php

namespace Leisure\Library\Session;

use Leisure\Library\Log\Log;

class Session {

    const SESSION_STATE_ACTIVE = true;
    const SESSION_STATE_INACTIVE = false;

    //always start in inactive
    private static $session_state = self::SESSION_STATE_INACTIVE;


    public static function Start()
    {
        if( self::$session_state === self::SESSION_STATE_INACTIVE ) {
            self::$session_state = session_start();
        }
        return self::$session_state;
    }

    public static function Destroy()
    {
        if( self::$session_state === self::SESSION_STATE_ACTIVE ) {
            session_unset();
            session_destroy();
            self::$session_state = self::SESSION_STATE_INACTIVE;
        }
        return !self::$session_state;
    }

    public static function ValidSession()
    {
        if( ! self::$session_state ) {
            Log::Get()->debug("ValidSession::Failed on SessionState");
            return false;
        }
        if( ! isset($_SESSION['username']) ) {
            Log::Get()->debug("ValidSession::Failed on username, not set");
            return false;
        }
        if( ! isset($_SESSION['expire'])) {
            Log::Get()->debug("ValidSession::Failed on expire, not set");
            return false;
        }
        if( $_SESSION['expire'] < time() ) {
            Log::Get()->debug("ValidSession::Failed on expire, session has expired");
            return false;
        }
        return true;
    }

    public static function GetSessionUser()
    {
        if( isset($_SESSION['username'])){
            return $_SESSION['username'];
        } else {
            return null;
        }
    }

    public static function GetSessionUserId()
    {
        if( isset($_SESSION['user_id'])){
            return $_SESSION['user_id'];
        } else {
            return null;
        }
    }

    public static function SetSessionUser($username)
    {
        $_SESSION['username'] = $username;
    }

    public static function SetSessionUserId($user_id)
    {
        $_SESSION['user_id'] = $user_id;
    }

    /**
     * Sets the expire time to 600 seconds (10 min) after call to allow for session
     * stepping on activity.
     */
    public static function SetExpire()
    {
        $_SESSION['expire'] = time() + 600;
    }

}