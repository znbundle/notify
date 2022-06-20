<?php

namespace ZnBundle\Notify\Domain\Repositories\Null;

use ZnBundle\Notify\Domain\Entities\SmsEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\SmsRepositoryInterface;
use ZnCore\Base\Libs\Repository\Base\BaseRepository;
use ZnCore\Domain\Interfaces\GetEntityClassInterface;

class SmsRepository extends BaseRepository implements SmsRepositoryInterface, GetEntityClassInterface
{

    public function getEntityClass(): string
    {
        return SmsEntity::class;
    }

    public function send(SmsEntity $smsEntity)
    {

    }
}
