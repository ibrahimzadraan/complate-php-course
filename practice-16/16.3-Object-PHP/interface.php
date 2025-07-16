<?php

interface NotificationService {
    public function send($message);
}

class EmailNotification implements NotificationService {
    public function send($message) {
        echo "Email sent: $message";
    }
}

class SMSNotification implements NotificationService {
    public function send($message) {
        echo "SMS sent: $message";
    }
}

class PushNotification implements NotificationService {
    public function send($message) {
        echo "Push Notification sent: $message";
    }
}

$email = new EmailNotification();
$email->send("Welcome to our service!");

echo "<br>";

$sms = new SMSNotification();
$sms->send("Your OTP is 123456");

echo "<br>";

$push = new PushNotification();
$push->send("You have a new message.");
