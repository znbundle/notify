<?php

namespace PhpBundle\Notify\Domain\Repositories\Dev;

use PhpBundle\Notify\Domain\Entities\EmailEntity;
use PhpBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;

class EmailRepository extends BaseRepository implements EmailRepositoryInterface
{

    //const DIRECTORY = __DIR__ . '/../../../../../../../../var/data/notify/email';

    public function send(EmailEntity $emailEntity)
    {
        $this->saveToFile($emailEntity);
    }

}
