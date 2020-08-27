<?php

namespace PhpBundle\Notify\Domain\Interfaces\Repositories;

use PhpBundle\Notify\Domain\Entities\EmailEntity;

interface EmailRepositoryInterface
{

    public function send(EmailEntity $emailEntity);

}