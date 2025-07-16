<?php

abstract class PaymentGateway {
    abstract public function pay($amount);
}

class PayPal extends PaymentGateway {
    public function pay($amount) {
        echo "PayPal payment processed successfully for $$amount";
    }
}


class GooglePay extends PaymentGateway {
    public function pay($amount) {
        echo "GooglePay payment processed successfully for $$amount";
    }
}

class Stripe extends PaymentGateway {
    public function pay($amount) {
        echo "Stripe payment processed successfully for $$amount";
    }
}

$payment = new PayPal();
$payment->pay(100);

echo "<br>";

$googlePay = new GooglePay();
$googlePay->pay(200);

echo "<br>";

$stripe = new Stripe();
$stripe->pay(300);
