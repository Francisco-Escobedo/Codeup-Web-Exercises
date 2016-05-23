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


    public static function getString($key, $min=null, $max=null)
    {
        if(!is_string($key) || !is_numeric($min) || !is_numeric($max)){
            throw new InvalidArgumentException ('Invalid entry into a field expecting string followed by integer inputs for argument');
        }

        if(empty($key)){
            throw new OutOfRangeException ('Key value is missing from input');
        }

        if(is_numeric($key)){
            throw new DomainException ('Value wrong data type, expecting string');
        }

        if(strlen($key)<$min || strlen($key)>$max){
            throw new LengthException ('String shorter or longer than accepted length');
        }

        if(self::get($key)!=null && is_string(self::get($key)) && 
            !is_numeric(self::get($key))){
           return self::get($key);
        } else {
            throw new Exception ('Value does not exist for Input or it is not a string');
        }
    }


    public static function getNumber($key, $min=null, $max=null)
    {
        if(!is_string($key) || !is_numeric($min) || !is_numeric($max)){
            throw new InvalidArgumentException ('Invalid entry into a field expecting numeric characters string followed by integer inputs for argument');
        }

        if(empty($key)){
            throw new OutOfRangeException ('Key value is missing from input');
        }   

        if(is_numeric($key)){
            throw new DomainException ('Value wrong data type, expecting number');
        }

        if($key<$min || $key>$max){
            throw new RangeException ('Numeric value smaller or longer than accepted range');
        }

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
