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


# Adapter Pattern Example in Bangladeshi Payment Gateways

```php
interface PaymentGateway {
    public function pay($amount);
}
class SSLCommerz implements PaymentGateway {
    public function pay($amount) {
        echo "Payment of ৳$amount processed via SSLCommerz.\n";
    }
}

class Bkash {
    public function makeBkashPayment($amount) {
        echo "Payment of ৳$amount processed via bKash.\n";
    }
}

// Adapter class to make bKash compatible with the PaymentGateway interface
class BkashAdapter implements PaymentGateway {
    private $bkash;

    public function __construct(Bkash $bkash) {
        $this->bkash = $bkash;
    }

    public function pay($amount) {
        // Translate the call to the Adaptee's method
        $this->bkash->makeBkashPayment($amount);
    }
}
function processPayment(PaymentGateway $gateway, $amount) {
    $gateway->pay($amount);
}

// Using SSLCommerz
$sslCommerz = new SSLCommerz();
processPayment($sslCommerz, 1000);

// Using bKash via the Adapter
$bkash = new Bkash();
$bkashAdapter = new BkashAdapter($bkash);
processPayment($bkashAdapter, 500); 
```

## Use Case

Our application is designed to support `SSLCommerz`. To integrate `bKash`—which has a different method for processing payments—we use an **Adapter** to bridge the gap.

## Structure

- **Target Interface**: `PaymentGateway`
  - Defines the interface for payment processing (`pay()` method).
- **Adaptee**: `bKash`
  - Has a different interface (`makeBkashPayment()` method).
- **Adapter**: `BkashAdapter`
  - Implements the `PaymentGateway` interface and adapts the `bKash` class to the expected interface.
- **Client**: A function that uses objects implementing the `PaymentGateway` interface.



