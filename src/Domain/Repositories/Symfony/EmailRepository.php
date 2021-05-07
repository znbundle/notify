<?php

namespace ZnBundle\Notify\Domain\Repositories\Symfony;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use ZnBundle\Notify\Domain\Entities\EmailEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;
use ZnCore\Base\Helpers\ComposerHelper;
use ZnCore\Domain\Base\Repositories\BaseRepository;
use ZnCore\Domain\Interfaces\Libs\EntityManagerInterface;

ComposerHelper::requireAssert(Mailer::class, 'symfony/mailer');
ComposerHelper::requireAssert(MessageBus::class, 'symfony/messenger');

class EmailRepository extends BaseRepository implements EmailRepositoryInterface
{

    private $mailer;

    public function __construct(EntityManagerInterface $em, MailerInterface $mailer)
    {
        parent::__construct($em);
        $this->mailer = $mailer;
    }

    public function send(EmailEntity $emailEntity)
    {
        $email = (new Email())
            ->from(new Address($emailEntity->getFrom()))
            ->to(new Address($emailEntity->getTo()))
            ->cc($emailEntity->getCc())
            ->bcc($emailEntity->getBcc())
            ->replyTo($emailEntity->getReplyTo())
            //->priority(Email::PRIORITY_HIGH)
            ->subject($emailEntity->getSubject())
            ->text($emailEntity->getBody())
            ->html($emailEntity->getHtml());
        $this->mailer->send($email);
    }
}
