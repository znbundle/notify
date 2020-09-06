<?php

namespace PhpBundle\Notify\Domain\Repositories\Dev;

use PhpBundle\Notify\Domain\Entities\SmsEntity;
use PhpBundle\Notify\Domain\Interfaces\Repositories\SmsRepositoryInterface;

class SmsRepository extends BaseRepository implements SmsRepositoryInterface
{

    protected function directory(): string
    {
        return parent::directory() . '/sms';
    }

    public function send(SmsEntity $smsEntity)
    {
        $this->saveToFile($smsEntity);
    }

}
