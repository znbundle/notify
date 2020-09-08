<?php

namespace ZnBundle\Notify\Domain\Repositories\Dev;

use ZnBundle\Notify\Domain\Entities\SmsEntity;
use ZnBundle\Notify\Domain\Entities\TestEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\SmsRepositoryInterface;

class SmsRepository extends TestRepository implements SmsRepositoryInterface
{

    /*protected function directory(): string
    {
        return parent::directory() . '/sms';
    }*/

    public function send(SmsEntity $smsEntity)
    {
        $testEntity = new TestEntity;
        $testEntity->setType('sms');
        $testEntity->setAddress($smsEntity->getPhone());
        $testEntity->setMessage($smsEntity->getMessage());
        $this->create($testEntity);
    }

}
