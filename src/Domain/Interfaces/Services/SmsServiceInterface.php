<?php

namespace PhpBundle\Notify\Domain\Interfaces\Services;

use PhpBundle\Notify\Domain\Entities\SmsEntity;
use PhpBundle\Queue\Domain\Enums\PriorityEnum;

interface SmsServiceInterface
{

    public function push(SmsEntity $smsEntity, $priority = PriorityEnum::NORMAL);

}