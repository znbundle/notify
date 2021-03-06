<?php

namespace ZnBundle\Notify\Domain\Interfaces\Repositories;

use Illuminate\Support\Collection;
use ZnBundle\Notify\Domain\Entities\ToastrEntity;
use ZnCore\Domain\Exceptions\UnprocessibleEntityException;

interface ToastrRepositoryInterface
{

    /**
     * @param ToastrEntity $toastrEntity
     * @return mixed
     * @throws UnprocessibleEntityException
     */
    public function create(ToastrEntity $toastrEntity);

    /**
     * @return Collection | ToastrEntity[]
     */
    public function all(): Collection;
}
