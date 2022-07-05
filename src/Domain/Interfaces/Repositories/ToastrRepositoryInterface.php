<?php

namespace ZnBundle\Notify\Domain\Interfaces\Repositories;

use ZnCore\Domain\Collection\Interfaces\Enumerable;
use ZnCore\Domain\Collection\Libs\Collection;
use ZnBundle\Notify\Domain\Entities\ToastrEntity;
use ZnCore\Base\Validation\Exceptions\UnprocessibleEntityException;

interface ToastrRepositoryInterface
{

    /**
     * @param ToastrEntity $toastrEntity
     * @return mixed
     * @throws UnprocessibleEntityException
     */
    public function create(ToastrEntity $toastrEntity);

    /**
     * @return \ZnCore\Domain\Collection\Interfaces\Enumerable | ToastrEntity[]
     */
    public function findAll(): Enumerable;
}
