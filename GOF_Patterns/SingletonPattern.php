<?php
//Singleton class
class LogSingleton
{
    private static $instance = null;
    
    private function __construct()
    {
    }
    public static function log()
    {
        if (self::$instance == null) {
            self::$instance = new LogSingleton();
        }
        return self::$instance;
    }
    //can also declare other public functions below.
    public function debugLog()
    {
        return "debug log";
    }
    public function testLog()
    {
        return "HELLOTESTLOG";
    }
    public function add($a,$b)
    {
        return $a + $b;
    }
}
//client code 
$client = LogSingleton::log(); //this is the singleton instance.
var_dump($client->debugLog());
var_dump($client->testLog());
var_dump($client->add(4,7));