<?php

namespace ZnBundle\Notify\Domain\Enums;

class NotifyPermissionEnum
{

    const TEST_READ = 'oNotifyTestRead';

    public static function getLabels()
    {
        return [
            self::TEST_READ => 'Список тестовых сообщений. Чтение',
        ];
    }
}