<?php

namespace PhpBundle\Notify\Domain\Entities;

use Symfony\Component\Validator\Constraints as Assert;
use PhpLab\Core\Domain\Interfaces\Entity\ValidateEntityInterface;

class TestEntity implements ValidateEntityInterface
{

    private $address = null;
    private $subject = null;
    private $message = null;
    private $type = null;
    private $createdAt = null;

    public function validationRules()
    {
        return [
            'address' => [
                new Assert\NotBlank,
            ],
            'message' => [
                new Assert\NotBlank,
            ],
            'createdAt' => [
                new Assert\NotBlank,
            ],
        ];
    }

    public function setAddress($value) : void
    {
        $this->address = $value;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

    public function setMessage($value) : void
    {
        $this->message = $value;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function setCreatedAt($value) : void
    {
        $this->createdAt = $value;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }


}

