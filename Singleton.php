<?php
class Singleton {
    private static $instance = null;
    private function __construct() {}
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

$instance = Singleton::getInstance(); 
echo "First instance created.\n";

$secondInstance = Singleton::getInstance(); 
if ($instance === $secondInstance) {
    echo "Same instance reused.\n";
}
