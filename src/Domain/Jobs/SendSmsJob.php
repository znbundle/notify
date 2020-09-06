<?php

namespace PhpBundle\Notify\Domain\Jobs;

use PhpBundle\Notify\Domain\Entities\SmsEntity;
use PhpBundle\Notify\Domain\Interfaces\Repositories\SmsRepositoryInterface;
use PhpBundle\Queue\Domain\Interfaces\JobInterface;
use Psr\Container\ContainerInterface;

class SendSmsJob implements JobInterface
{

    /** @var SmsEntity */
    public $entity;

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function run()
    {
        /** @var SmsRepositoryInterface $repository */
        $repository = $this->container->get(SmsRepositoryInterface::class);
        $repository->send($this->entity);
    }
}