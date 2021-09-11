<?php

interface NotificationInterface
{
    public function buildNotification(array $options);
    public function sendNotification();
}

interface SMSNotificationInterface
{
    public function createNotification(array $options);
    public function send();
}

class EmailNotification implements NotificationInterface
{
    private string $emailTo;
    private string $emailFrom;
    private string $emailSubject;
    private string $emailBody;

    public function buildNotification(array $options)
    {
        $this->emailTo = $options['emailTo'];
        $this->emailFrom = $options['emailFrom'];
        $this->emailSubject = $options['emailSubject'];
        $this->emailBody = $options['emailBody'];
    }

    public function sendNotification()
    {
        echo "E-Mail To: " . $this->emailTo . PHP_EOL;
        echo "E-Mail From: " . $this->emailFrom . PHP_EOL;
        echo "E-Mail Subject: " . $this->emailSubject . PHP_EOL;
        echo "E-Mail Body: " . $this->emailBody . PHP_EOL;
    }
}

class SMSNotification implements SMSNotificationInterface
{
    private string $phoneNumber;
    private string $message;

    public function createNotification(array $options)
    {
        $this->phoneNumber = $options['phoneNumber'];
        $this->message = $options['message'];
    }

    public function send()
    {
        echo "SMS To: " . $this->phoneNumber . PHP_EOL;
        echo "Message: " . $this->message . PHP_EOL;
    }
}

class SMSNotificationAdapter implements NotificationInterface
{
    public function __construct(private SMSNotificationInterface $smsObj)
    {
    }

    public function buildNotification(array $options)
    {
        $this->smsObj->createNotification($options);
    }

    public function sendNotification()
    {
        $this->smsObj->send();
    }
}

$notification = new EmailNotification();
$notification->buildNotification([
    'emailTo' => 'emailto@to',
    'emailFrom' => 'emailfrom@from',
    'emailSubject' => 'New notification subject',
    'emailBody' => 'New notification body'
]);
$notification->sendNotification();

$object = new SMSNotificationAdapter(new SMSNotification);
$object->buildNotification(['phoneNumber' => '+000', 'message' => 'New notification']);
$object->sendNotification();
