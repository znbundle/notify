<?php

return [
    'singletons' => [
        'ZnBundle\Notify\Domain\Interfaces\Services\ToastrServiceInterface' => 'ZnBundle\Notify\Domain\Services\ToastrService',
        'ZnBundle\Notify\Domain\Interfaces\Services\FlashServiceInterface' => 'ZnBundle\Notify\Domain\Services\FlashService',
        'ZnBundle\Notify\Domain\Interfaces\Services\SmsServiceInterface' => 'ZnBundle\Notify\Domain\Services\SmsService',
        'ZnBundle\Notify\Domain\Interfaces\Repositories\SmsRepositoryInterface' => 'ZnBundle\Notify\Domain\Repositories\Dev\SmsRepository',
        'ZnBundle\Notify\Domain\Interfaces\Repositories\TestRepositoryInterface' => 'ZnBundle\Notify\Domain\Repositories\Dev\TestRepository',
        'ZnBundle\Notify\Domain\Interfaces\Repositories\FlashRepositoryInterface' => 'ZnBundle\Notify\Domain\Repositories\Session\FlashRepository',
        //'ZnBundle\Notify\Domain\Interfaces\Repositories\ToastrRepositoryInterface' => 'ZnBundle\Notify\Domain\Repositories\Session\ToastrRepository',
    ],
];