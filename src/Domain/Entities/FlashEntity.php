<?php

namespace ZnBundle\Notify\Domain\Entities;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use ZnCore\Base\Libs\Entity\Interfaces\ValidateEntityByMetadataInterface;

class FlashEntity implements ValidateEntityByMetadataInterface
{

    private $type = null;

    private $message = null;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {

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
