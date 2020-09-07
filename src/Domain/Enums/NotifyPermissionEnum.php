<?php

namespace PhpBundle\Notify\Domain\Enums;

use PhpLab\Core\Domain\Base\BaseEnum;

class NotifyPermissionEnum extends BaseEnum
{

    const TEST_READ = 'oNotifyTestRead';

    public static function getLabels() {
        return [
            self::TEST_READ => 'Список тестовых сообщений. Чтение',
        ];
    }
}