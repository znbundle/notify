<?php

namespace PhpBundle\Notify\Domain\Services;

use PhpBundle\Notify\Domain\Interfaces\Services\TestServiceInterface;
use PhpBundle\Notify\Domain\Interfaces\Repositories\TestRepositoryInterface;
use PhpLab\Core\Domain\Base\BaseCrudService;

class TestService extends BaseCrudService implements TestServiceInterface
{

    public function __construct(TestRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    
}
