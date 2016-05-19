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
        if(Input::has($key) && is_string(Input::get($key))){
            Input::get($key);
        } else {
            throw new Exception ('Value does not exist for $key or it is not a string');
        }
    }


    public static function getNumber($key)
    {
        if(Input::has($key) && is_int(Input::get($key))){
            self::get($key);
        } else {
            throw new Exception ('Value does not exist for $key or it is not an integer')
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
