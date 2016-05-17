<?php

// class File {

//     private $filename;

//     private $handle;

//     protected function __construct($name)
//     {
//         $this->filename = "$name";
//         $this->handle = fopen($this->filename, 'a');
//     }

//     public function checkString()
//     {
//         return is_string($this->filename);
//     }

//     public function append($username)
//     {
//         $date = date("Y-m-d H:i:s");
//         fwrite($this->handle, 'User '. $username ." logged in $date.". PHP_EOL);
//     }

//     public function failed($username)
//     {
//     $date = date("Y-m-d H:i:s");
//     fwrite($this->handle, 'User '. $username ." failed to log in $date.". PHP_EOL);
//     }

//     public function close()
//     {
//         fclose($this->handle);
//     }

// }


class Log {

    public function __construct($prefix='log') {
        $date = date("Y-m-d");
        $this->filename = "$prefix-$date.log";
        if (touch($this->filename)&&is_writeable($this->filename)){
            echo "The $this->filename has been appended";
        } else {
            echo "The file is not writable";
        }
    }

    private function checkString(){
        if(is_string($this->filename)){
            $this->handle = fopen($this->filename, 'a');
        }
    }

    public function triggerCheckString(){
        $this->checkString();
    }

    public function __destruct() {
        fclose($this->handle);
    }

    private $filename;

    private $handle;

    public function logMessage($logLevel, $message){
        $today = date("Y-m-d H:i:s");
        fwrite($this->handle, $today . ' ' . $logLevel . ' ' . $message . PHP_EOL);
    }

    public function info($message){
        $this->logMessage('[INFO]', $message);
    }

    public function error($message){
        $this->logMessage('[ERROR]', $message);
    }

}

$flog = new Log;
$flog->triggerCheckString();
$flog->info("This is an info message.");
