<?php

namespace ZnBundle\Notify\Domain\Repositories\YiiSession;

use Illuminate\Support\Collection;
use Psr\Container\ContainerInterface;
use ZnBundle\Notify\Domain\Entities\ToastrEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\ToastrRepositoryInterface;
use ZnCore\Base\Libs\Container\Traits\ContainerAwareTrait;
use ZnCore\Base\Libs\Validation\Helpers\ValidationHelper;
use ZnCore\Base\Libs\EntityManager\Interfaces\EntityManagerInterface;
use ZnCore\Base\Libs\EntityManager\Traits\EntityManagerAwareTrait;
use Yii;

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

    public function all(): Collection {
        $items = Yii::$app->session->getFlash('flash-alert');
        return new Collection($items);
//        return $this->getEntityManager()->createEntityCollection(ToastrEntity::class, $items);
    }
}
