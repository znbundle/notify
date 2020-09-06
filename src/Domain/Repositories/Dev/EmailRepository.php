<?php

namespace PhpBundle\Notify\Domain\Repositories\Dev;

use PhpBundle\Notify\Domain\Entities\EmailEntity;
use PhpBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;

class EmailRepository extends BaseRepository implements EmailRepositoryInterface
{

    protected function directory(): string
    {
        return parent::directory() . '/email';
    }

    public function send(EmailEntity $emailEntity)
    {
        $this->saveToFile($emailEntity);
    }

}
