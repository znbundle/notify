<?php

namespace ZnBundle\Notify\Domain\Services;

use Illuminate\Support\Collection;
use ZnBundle\Notify\Domain\Entities\ToastrEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\ToastrRepositoryInterface;
use ZnBundle\Notify\Domain\Interfaces\Services\ToastrServiceInterface;
use ZnCore\Base\Libs\I18Next\Facades\I18Next;
use ZnCore\Domain\Base\BaseService;
use ZnBundle\Notify\Domain\Enums\FlashMessageTypeEnum;
use ZnBundle\Notify\Domain\Interfaces\Repositories\FlashRepositoryInterface;
use ZnBundle\Notify\Domain\Interfaces\Services\FlashServiceInterface;

class ToastrService extends BaseService implements ToastrServiceInterface
{

    const DEFAULT_DELAY = 5000;

    public function __construct(ToastrRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    public function success($message, int $delay = null)
    {
        $this->add(FlashMessageTypeEnum::SUCCESS, $message, $delay);
    }

    public function info($message, int $delay = null)
    {
        $this->add(FlashMessageTypeEnum::INFO, $message, $delay);
    }

    public function warning($message, int $delay = null)
    {
        $this->add(FlashMessageTypeEnum::WARNING, $message, $delay);
    }

    public function error($message, int $delay = null)
    {
        $this->add(FlashMessageTypeEnum::ERROR, $message, $delay);
    }

    public function add(string $type, $message, int $delay = null)
    {
        if($delay == null) {
            $delay = self::DEFAULT_DELAY;
        }
        if (is_array($message)) {
            $message = I18Next::translateFromArray($message);
        }
        $toastrEntity = new ToastrEntity();
        $toastrEntity->setType($type);
        $toastrEntity->setContent($message);
        $toastrEntity->setDelay($delay);
        $this->getRepository()->create($toastrEntity);
    }

    public function clear()
    {
        $this->getRepository()->clear();
    }
    
    public function all(): Collection {
        return $this->getRepository()->all();
    }
}
