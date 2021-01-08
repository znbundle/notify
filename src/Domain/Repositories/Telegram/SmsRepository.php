<?php

namespace ZnBundle\Notify\Domain\Repositories\Telegram;

use ZnBundle\Notify\Domain\Entities\SmsEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\SmsRepositoryInterface;
use ZnTool\Dev\Dumper\Domain\Facades\Bot;

class SmsRepository implements SmsRepositoryInterface
{

    public function send(SmsEntity $smsEntity)
    {
        $message =
            'Phone: ' . $smsEntity->getPhone() . PHP_EOL .
            'Message: ' . $smsEntity->getMessage();
        Bot::sendAsString($message);
    }
}
