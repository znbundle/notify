<?php

namespace ZnBundle\Notify\Domain\Repositories\File;

use ZnBundle\Notify\Domain\Entities\EmailEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;
use ZnCore\Domain\Base\Repositories\BaseFileCrudRepository;
use ZnCore\Domain\Helpers\EntityHelper;
use ZnLib\Telegram\Domain\Facades\Bot;
use ZnSandbox\Sandbox\Casbin\Domain\Entities\RoleEntity;

class EmailRepository extends BaseFileCrudRepository implements EmailRepositoryInterface
{

    public function getEntityClass(): string
    {
        return EmailEntity::class;
    }

    public function fileName(): string
    {
        return __DIR__ . '/../../../../../../../var/file-db/notify_email.php';
    }

    public function send(EmailEntity $emailEntity)
    {
        $items = $this->getItems();
        $items = [
            EntityHelper::toArray($emailEntity)
        ];
        $this->setItems($items);
    }
}
