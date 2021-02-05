<?php

namespace ZnBundle\Notify\Domain\Interfaces\Services;

use Illuminate\Support\Collection;
use ZnBundle\Notify\Domain\Entities\ToastrEntity;

interface ToastrServiceInterface
{

    public function success(string $message, int $delay = null);

    public function info(string $message, int $delay = null);

    public function warning(string $message, int $delay = null);

    public function error(string $message, int $delay = null);

    public function add(string $type, string $messageint, int $delay = null);

    /**
     * @return Collection | ToastrEntity[]
     */
    public function all(): Collection;
}
