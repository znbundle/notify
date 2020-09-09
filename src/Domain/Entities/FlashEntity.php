<?php

namespace ZnBundle\Notify\Domain\Entities;

use Symfony\Component\Validator\Constraints as Assert;
use ZnCore\Domain\Interfaces\Entity\ValidateEntityInterface;

class FlashEntity implements ValidateEntityInterface
{

    private $type = null;

    private $message = null;

    public function validationRules()
    {
        return [];
    }

    public function setType($value)
    {
        $this->type = $value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setMessage($value)
    {
        $this->message = $value;
    }

    public function getMessage()
    {
        return $this->message;
    }


}

