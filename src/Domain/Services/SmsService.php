<?php

namespace PhpBundle\Notify\Domain\Services;

use PhpBundle\Notify\Domain\Entities\SmsEntity;
use PhpBundle\Notify\Domain\Interfaces\Services\SmsServiceInterface;
use PhpBundle\Queue\Domain\Enums\PriorityEnum;

class SmsService implements SmsServiceInterface
{

    public function push(SmsEntity $smsEntity, $priority = PriorityEnum::NORMAL)
    {

    }

}
