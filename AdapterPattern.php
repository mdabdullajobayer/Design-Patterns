<?php
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
