<?php

namespace ZnBundle\Notify\Domain\Interfaces\Repositories;

use ZnBundle\Notify\Domain\Entities\ToastrEntity;
use ZnCore\Base\Validation\Exceptions\UnprocessibleEntityException;
use ZnCore\Domain\Collection\Interfaces\Enumerable;

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
