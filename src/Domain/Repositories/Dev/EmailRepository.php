<?php

namespace PhpBundle\Notify\Domain\Repositories\Dev;

use PhpBundle\Notify\Domain\Entities\EmailEntity;
use PhpBundle\Notify\Domain\Entities\TestEntity;
use PhpBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;

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
