<?php

namespace PhpBundle\Notify\Domain\Services;

use PhpBundle\Notify\Domain\Entities\SmsEntity;
use PhpBundle\Notify\Domain\Enums\ChannelEnum;
use PhpBundle\Notify\Domain\Interfaces\Repositories\SmsRepositoryInterface;
use PhpBundle\Notify\Domain\Interfaces\Services\SmsServiceInterface;
use PhpBundle\Notify\Domain\Jobs\SendSmsJob;
use PhpBundle\Queue\Domain\Enums\PriorityEnum;
use PhpBundle\Queue\Domain\Interfaces\Services\JobServiceInterface;
use Psr\Container\ContainerInterface;

class SmsService implements SmsServiceInterface
{

    private $smsRepository;
    private $jobService;
    private $container;

    public function __construct(
        SmsRepositoryInterface $smsRepository,
        JobServiceInterface $jobService,
        ContainerInterface $container
    )
    {
        $this->smsRepository = $smsRepository;
        $this->jobService = $jobService;
        $this->container = $container;
    }

    public function push(SmsEntity $emailEntity, $priority = PriorityEnum::NORMAL)
    {
        $emailJob = new SendSmsJob($this->container);
        $emailJob->entity = $emailEntity;
        $pushResult = $this->jobService->push($emailJob, $priority, ChannelEnum::SMS);
    }

}
