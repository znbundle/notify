<?php

namespace ZnBundle\Notify\Domain\Repositories\Symfony;

use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Yii;
use ZnBundle\Notify\Domain\Entities\ToastrEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\ToastrRepositoryInterface;
use ZnCore\Base\Libs\Validation\Helpers\ValidationHelper;
use ZnCore\Base\Libs\EntityManager\Interfaces\EntityManagerInterface;
use ZnCore\Base\Libs\EntityManager\Traits\EntityManagerAwareTrait;

class ToastrRepository implements ToastrRepositoryInterface
{

    use EntityManagerAwareTrait;

    private static $all = [];
    private $session;

    public function __construct(EntityManagerInterface $em, SessionInterface $session)
    {
        $this->setEntityManager($em);
        $this->session = $session;
    }

    public function create(ToastrEntity $toastrEntity)
    {
        ValidationHelper::validateEntity($toastrEntity);
        self::$all[] = $toastrEntity;
        $this->sync();
    }

    public function all(): Collection
    {
        $items = $this->session->get('flash-alert');
        return new Collection($items);
    }

    public function clear()
    {
        self::$all[] = [];
        $this->session->remove('flash-alert');
    }

    private function sync()
    {
        $this->session->set('flash-alert', self::$all);
    }
}
