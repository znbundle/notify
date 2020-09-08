<?php

namespace ZnBundle\Notify\Domain\Services;

use ZnBundle\Notify\Domain\Entities\EmailEntity;
use ZnBundle\Notify\Domain\Enums\ChannelEnum;
use ZnBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;
use ZnBundle\Notify\Domain\Interfaces\Services\EmailServiceInterface;
use ZnBundle\Notify\Domain\Jobs\SendEmailJob;
use ZnBundle\Queue\Domain\Enums\PriorityEnum;
use ZnBundle\Queue\Domain\Interfaces\Services\JobServiceInterface;

class EmailService implements EmailServiceInterface
{

    private $emailRepository;
    private $jobService;

    public function __construct(EmailRepositoryInterface $emailRepository, JobServiceInterface $jobService)
    {
        $this->emailRepository = $emailRepository;
        $this->jobService = $jobService;
    }

    public function push(EmailEntity $emailEntity, $priority = PriorityEnum::NORMAL)
    {
        $emailJob = new SendEmailJob($this);
        $emailJob->entity = $emailEntity;
        $pushResult = $this->jobService->push($emailJob, $priority, ChannelEnum::EMAIL);
    }

}
