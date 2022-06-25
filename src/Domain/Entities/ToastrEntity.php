<?php

namespace ZnBundle\Notify\Domain\Entities;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use ZnBundle\Notify\Domain\Enums\FlashMessageTypeEnum;
use ZnLib\Components\Status\Enums\StatusEnum;
use ZnCore\Base\Enum\Helpers\EnumHelper;
use ZnCore\Base\Enum\Constraints\Enum;
use ZnCore\Base\Validation\Interfaces\ValidationByMetadataInterface;

class ToastrEntity implements ValidationByMetadataInterface
{

    private $type;
    private $content;
    private $delay;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('type', new Assert\NotBlank());
        $metadata->addPropertyConstraint('type', new Enum([
            'class' => FlashMessageTypeEnum::class,
        ]));
        $metadata->addPropertyConstraint('content', new Assert\NotBlank());
        $metadata->addPropertyConstraint('delay', new Assert\NotBlank());
        $metadata->addPropertyConstraint('delay', new Assert\Positive());
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getDelay(): int
    {
        return $this->delay;
    }

    public function setDelay(int $delay): void
    {
        $this->delay = $delay;
    }
}
