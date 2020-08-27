<?php

namespace PhpBundle\Notify\Domain\Interfaces\Services;

use PhpBundle\Notify\Domain\Entities\EmailEntity;
use PhpBundle\Queue\Domain\Enums\PriorityEnum;

interface EmailServiceInterface
{

    public function push(EmailEntity $emailEntity, $priority = PriorityEnum::NORMAL);

}