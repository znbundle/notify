<?php

namespace ZnBundle\Notify\Domain\Repositories\File;

use ZnBundle\Notify\Domain\Entities\EmailEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;
use ZnCore\Base\Legacy\Yii\Helpers\ArrayHelper;
use ZnCore\Domain\Base\Repositories\BaseFileCrudRepository;
use ZnCore\Domain\Helpers\EntityHelper;

class EmailRepository extends BaseRepository implements EmailRepositoryInterface
{

    public function getEntityClass(): string
    {
        return EmailEntity::class;
    }

    public function tableName(): string
    {
        return 'notify_email';
    }

    public function send(EmailEntity $emailEntity)
    {
        $this->insert($emailEntity);
    }
}
