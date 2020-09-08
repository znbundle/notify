<?php

namespace PhpBundle\Notify\Domain\Repositories\Dev;

use PhpBundle\Notify\Domain\Entities\SmsEntity;
use PhpBundle\Notify\Domain\Entities\TestEntity;
use PhpBundle\Notify\Domain\Interfaces\Repositories\SmsRepositoryInterface;

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
