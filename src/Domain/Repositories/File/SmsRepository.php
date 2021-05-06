<?php

namespace ZnBundle\Notify\Domain\Repositories\File;

use ZnBundle\Notify\Domain\Entities\EmailEntity;
use ZnBundle\Notify\Domain\Entities\SmsEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\SmsRepositoryInterface;
use ZnCore\Domain\Base\Repositories\BaseFileCrudRepository;
use ZnCore\Domain\Helpers\EntityHelper;
use ZnLib\Telegram\Domain\Facades\Bot;

class SmsRepository extends BaseFileCrudRepository implements SmsRepositoryInterface
{

    public function getEntityClass(): string
    {
        return SmsEntity::class;
    }

    public function fileName(): string
    {
        return __DIR__ . '/../../../../../../../var/file-db/notify_sms.php';
    }

    public function send(SmsEntity $smsEntity)
    {
        $items = $this->getItems();
        $items = [
            EntityHelper::toArray($smsEntity)
        ];
        $this->setItems($items);
    }
}
