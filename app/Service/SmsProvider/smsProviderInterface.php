<?php

namespace App\Service\SmsProvider;

interface smsProviderInterface
{
    function send($phone,$message);

}
