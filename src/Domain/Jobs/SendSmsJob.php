<?php

namespace PhpBundle\Notify\Domain\Jobs;

use PhpBundle\Notify\Domain\Entities\SmsEntity;
use PhpBundle\Notify\Domain\Interfaces\Repositories\SmsRepositoryInterface;
use PhpBundle\Queue\Domain\Interfaces\JobInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class SendSmsJob implements JobInterface, ContainerAwareInterface
{

    use ContainerAwareTrait;

    /** @var SmsEntity */
    public $entity;

    public function run()
    {
        $repository = $this->container->get(SmsRepositoryInterface::class);
        $repository->send($this->entity);
    }

}