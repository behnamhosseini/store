<?php

namespace App\Service\SmsProvider;

use App\Service\smsProvider;

class SmsGateway
{

    private array $smsProvider;

    public function __construct(smsProviderInterface... $smsProvider)
    {
        $this->smsProvider = $smsProvider;
    }

    function smsSend($phone,$message)
    {
        foreach ($this->smsProvider as $s){
            try {
                $s->send($phone, $message);
                break;
            }catch (\Exception $e){
                info($e->getMessage());
                continue;
            }
        }
    }
}
