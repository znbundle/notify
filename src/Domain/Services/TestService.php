<?php

namespace ZnBundle\Notify\Domain\Services;

use ZnBundle\Notify\Domain\Interfaces\Services\TestServiceInterface;
use ZnBundle\Notify\Domain\Interfaces\Repositories\TestRepositoryInterface;
use ZnCore\Domain\Base\BaseCrudService;

class TestService extends BaseCrudService implements TestServiceInterface
{

    public function __construct(TestRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }
    
}
