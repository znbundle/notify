<?php

namespace ZnBundle\Notify\Domain\Enums;

use ZnCore\Domain\Base\BaseEnum;

class NotifyPermissionEnum extends BaseEnum
{

    const TEST_READ = 'oNotifyTestRead';

    public static function getLabels() {
        return [
            self::TEST_READ => 'Список тестовых сообщений. Чтение',
        ];
    }
}