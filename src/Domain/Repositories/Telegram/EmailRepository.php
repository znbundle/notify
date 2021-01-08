<?php

namespace ZnBundle\Notify\Domain\Repositories\Telegram;

use ZnBundle\Notify\Domain\Entities\EmailEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;
use ZnTool\Dev\Dumper\Domain\Facades\Bot;

class EmailRepository implements EmailRepositoryInterface
{

    public function send(EmailEntity $emailEntity)
    {
        $message =
            '# Email' . PHP_EOL .
            'From: ' . $emailEntity->getFrom() . PHP_EOL .
            'To: ' . $emailEntity->getTo() . PHP_EOL .
            'Subject: ' . $emailEntity->getSubject() . PHP_EOL .
            'Body: ' . $emailEntity->getBody();
        Bot::send($message);
    }
}
