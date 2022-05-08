<?php

namespace ZnBundle\Notify\Domain\Repositories\YiiSession;

use Illuminate\Support\Collection;
use Psr\Container\ContainerInterface;
use ZnBundle\Notify\Domain\Entities\ToastrEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\ToastrRepositoryInterface;
use ZnCore\Base\Libs\Container\Traits\ContainerAwareTrait;
use ZnCore\Domain\Helpers\ValidationHelper;
use ZnCore\Domain\Interfaces\Libs\EntityManagerInterface;
use ZnCore\Domain\Traits\EntityManagerTrait;
use Yii;

class ToastrRepository implements ToastrRepositoryInterface
{

    //use ContainerAwareTrait;
    use EntityManagerTrait;

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

    public function all(): Collection {
        $items = Yii::$app->session->getFlash('flash-alert');
        return new Collection($items);
//        return $this->getEntityManager()->createEntityCollection(ToastrEntity::class, $items);
    }
}
