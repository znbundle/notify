<?php

namespace ZnBundle\Notify\Domain\Repositories\Dev;

use ZnBundle\Notify\Domain\Entities\EmailEntity;
use ZnBundle\Notify\Domain\Entities\TestEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;

class EmailRepository extends TestRepository implements EmailRepositoryInterface
{

    /*protected function directory(): string
    {
        return parent::directory() . '/email';
    }*/

    public function send(EmailEntity $emailEntity)
    {
        $testEntity = new TestEntity;
        $testEntity->setType('email');
        $testEntity->setSubject($emailEntity->getSubject());
        $testEntity->setAddress($emailEntity->getTo());
        $testEntity->setMessage($emailEntity->getBody());
        $this->create($testEntity);
    }

}
