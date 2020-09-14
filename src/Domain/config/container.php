<?php

return [
    'ZnBundle\\Notify\\Domain\\Interfaces\\Repositories\\SmsRepositoryInterface' => 'ZnBundle\\Notify\\Domain\\Repositories\\Dev\\SmsRepository',
    'ZnBundle\\Notify\\Domain\\Interfaces\\Repositories\\TestRepositoryInterface' => 'ZnBundle\\Notify\\Domain\\Repositories\\Dev\\TestRepository',
    'ZnBundle\Notify\Domain\Interfaces\Repositories\FlashRepositoryInterface' => 'ZnBundle\Notify\Domain\Repositories\Session\FlashRepository',
];