# Design Patterns
### Singleton Pattern  
```php
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
```
#### **Private Static Property** ($instance):
- The static property $instance holds the single instance of the Singleton class.
#### **Private Constructor (__construct):**
- The constructor is private, which prevents instantiating the class with new Singleton(). This ensures that instances can only be created through the getInstance method.
#### **Public Static Method (getInstance):**
- getInstance() checks if an instance of Singleton already exists by checking if self::$instance is null.
- If no instance exists, it creates a new one and assigns it to self::$instance.
- If an instance already exists, it returns the existing instance, thus enforcing the singleton pattern.
