<?php

namespace PhpBundle\Notify\Domain\Services;

use PhpLab\Core\Domain\Base\BaseService;
use PhpBundle\Notify\Domain\Enums\FlashMessageTypeEnum;
use PhpBundle\Notify\Domain\Interfaces\Repositories\FlashRepositoryInterface;
use PhpBundle\Notify\Domain\Interfaces\Services\FlashServiceInterface;

class FlashService extends BaseService implements FlashServiceInterface
{

    public function __construct(FlashRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function addSuccess(string $message)
    {
        $this->add(FlashMessageTypeEnum::SUCCESS, $message);
    }

    public function addInfo(string $message)
    {
        $this->add(FlashMessageTypeEnum::INFO, $message);
    }

    public function addWarning(string $message)
    {
        $this->add(FlashMessageTypeEnum::WARNING, $message);
    }

    public function addError(string $message)
    {
        $this->add(FlashMessageTypeEnum::ERROR, $message);
    }

    public function add(string $type, string $message)
    {
        $this->repository->add($type, $message);
    }
}
