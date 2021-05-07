<?php

namespace ZnBundle\Notify\Domain\Repositories\Symfony;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Email;
use ZnBundle\Notify\Domain\Entities\EmailEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\EmailRepositoryInterface;
use ZnCore\Base\Helpers\ComposerHelper;
use ZnCore\Domain\Base\Repositories\BaseRepository;
use ZnCore\Domain\Interfaces\Libs\EntityManagerInterface;
use Symfony\Component\Mime\Address;

ComposerHelper::requireAssert(MailerInterface::class, 'symfony/mailer');
ComposerHelper::requireAssert(MessageBusInterface::class, 'symfony/messenger');

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
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($emailEntity->getSubject())
            ->text(strip_tags($emailEntity->getBody()))
            ->html($emailEntity->getBody());
        $this->mailer->send($email);
    }
}
