<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        // TODO: Fill in this function
        return isset($_REQUEST[$key]);
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        // TODO: Fill in this function
        return Input::has($key) ? $_REQUEST[$key] : null;
    }


    public static function getString($key)
    {
        if(self::get($key)!=null && is_string(self::get($key)) && 
            !is_numeric(self::get($key))){
           return self::get($key);
        } else {
            throw new Exception ('Value does not exist for Input or it is not a string');
        }
    }


    public static function getNumber($key)
    {
        if(self::get($key)!=null &&
        is_numeric(self::get($key)))
        {
            return self::get($key);
        } else {
            throw new Exception ('Value does not exist for Input or it is not an integer');
        }
    }

    protected static $d;

    public static function getDate($key)
    {
        if(self::get($key)!=null && self::get($key)>1000 && self::get($key)<2100){
            return self::get($key);
            self::$d = new DateTime();
            // return $d->format(Y);
        } else {
            throw new Exception ('Date established does not exist or is not within acceptable date range');
        }
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
