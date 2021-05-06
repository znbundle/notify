<?php

namespace ZnBundle\Notify\Domain\Repositories\File;

use ZnBundle\Notify\Domain\Entities\EmailEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;
use ZnCore\Base\Legacy\Yii\Helpers\ArrayHelper;
use ZnCore\Domain\Base\Repositories\BaseFileCrudRepository;
use ZnCore\Domain\Helpers\EntityHelper;

class EmailRepository extends BaseFileCrudRepository implements EmailRepositoryInterface
{

    public $limitItems = 3;

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
        $items = $this->getItems();
        $items[] = EntityHelper::toArray($emailEntity);
        $this->setItems($items);
    }

    public function oneLast(): EmailEntity
    {
        return $this->all()->last();
    }

    protected function setItems(array $items)
    {
        $items = $this->cleanByLimit($items);
        return parent::setItems($items);
    }

    private function cleanByLimit(array $items) {
        $count = count($items);
        if($count > $this->limitItems) {
            $items = array_slice($items,  $count - $this->limitItems, $this->limitItems);
        }
        return $items;
    }
}
