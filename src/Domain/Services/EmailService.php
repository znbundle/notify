<?php

namespace PhpBundle\Notify\Domain\Services;

use PhpBundle\Notify\Domain\Entities\EmailEntity;
use PhpBundle\Notify\Domain\Enums\ChannelEnum;
use PhpBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;
use PhpBundle\Notify\Domain\Interfaces\Services\EmailServiceInterface;
use PhpBundle\Notify\Domain\Jobs\SendEmailJob;
use PhpBundle\Queue\Domain\Enums\PriorityEnum;
use PhpBundle\Queue\Domain\Interfaces\Services\JobServiceInterface;

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
