<?php

namespace App\Service\SmsProvider;

use App\Service\smsProvider;

class ServiceC implements smsProviderInterface
{

    function send($phone, $message)
    {
        info('sending sms from Service C : ' . $phone . ' : ' . $message);
    }
}
