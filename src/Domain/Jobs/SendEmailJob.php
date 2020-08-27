<?php

namespace PhpBundle\Notify\Domain\Jobs;

use PhpBundle\Notify\Domain\Entities\EmailEntity;
use PhpBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;
use PhpBundle\Queue\Domain\Interfaces\JobInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class SendEmailJob implements JobInterface, ContainerAwareInterface
{

    use ContainerAwareTrait;

    /** @var EmailEntity */
    public $entity;

    public function run()
    {
        /** @var EmailRepositoryInterface $emailRepository */
        $emailRepository = $this->container->get(EmailRepositoryInterface::class);
        $emailRepository->send($this->entity);
    }

}