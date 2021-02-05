<?php

namespace ZnBundle\Notify\Domain\Interfaces\Services;

use Illuminate\Support\Collection;
use ZnBundle\Notify\Domain\Entities\ToastrEntity;

interface ToastrServiceInterface
{

    public function success($message, int $delay = null);

    public function info($message, int $delay = null);

    public function warning($message, int $delay = null);

    public function error($message, int $delay = null);

    public function add(string $type, $message, int $delay = null);

    /**
     * @return Collection | ToastrEntity[]
     */
    public function all(): Collection;
}
