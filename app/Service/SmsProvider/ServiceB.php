<?php

namespace App\Service\SmsProvider;

class ServiceB implements smsProviderInterface
{

    function send($phone, $message)
    {
        info('sending sms from Service B : '.$phone. ' : '. $message);
    }
}
