<?php

namespace App\Service\SmsProvider;

class ServiceA implements smsProviderInterface
{

    function send($phone, $message)
    {
        info('sending sms from Service A : '.$phone. ' : '. $message);
    }
}
