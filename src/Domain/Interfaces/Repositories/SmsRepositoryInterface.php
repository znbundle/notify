<?php

namespace PhpBundle\Notify\Domain\Interfaces\Repositories;

use PhpBundle\Notify\Domain\Entities\SmsEntity;

interface SmsRepositoryInterface
{

    public function send(SmsEntity $smsEntity);

}