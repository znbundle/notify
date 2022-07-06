<?php

namespace ZnBundle\Notify\Domain\Repositories\YiiSession;

use Yii;
use ZnBundle\Notify\Domain\Entities\ToastrEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\ToastrRepositoryInterface;
use ZnCore\Validation\Helpers\ValidationHelper;
use ZnCore\Collection\Interfaces\Enumerable;
use ZnCore\Collection\Libs\Collection;
use ZnCore\EntityManager\Interfaces\EntityManagerInterface;
use ZnCore\EntityManager\Traits\EntityManagerAwareTrait;

class ToastrRepository implements ToastrRepositoryInterface
{

    //use ContainerAwareTrait;
    use EntityManagerAwareTrait;

    private static $all = [];

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    public function create(ToastrEntity $toastrEntity)
    {
        ValidationHelper::validateEntity($toastrEntity);
        self::$all[] = $toastrEntity;
        Yii::$app->session->setFlash('flash-alert', self::$all);
    }

    public function findAll(): Enumerable
    {
        $items = Yii::$app->session->getFlash('flash-alert');
        return new Collection($items);
//        return $this->getEntityManager()->createEntityCollection(ToastrEntity::class, $items);
    }
}
