<?php

namespace App\Service;

use App\Repository\v1\ProductRepository;
use App\Service\SmsProvider\SmsGateway;
use App\Service\SmsProvider\smsProviderInterface;


class SendSmsUseCase
{

    public function __construct(public SmsGateway $smsGateway){}

    public function execute($phone, $message)
    {
        $this->smsGateway->smsSend($phone, $message);
    }

}
