<?php

namespace ZnBundle\Notify\Yii2\Api\controllers;

use ZnBundle\Notify\Domain\Enums\NotifyPermissionEnum;
use ZnBundle\Notify\Domain\Services\TestService;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use ZnLib\Rest\Yii2\Base\BaseCrudController;

class TestController extends BaseCrudController
{

    //use AccessTrait;

    private $testService;

    public function __construct(
        string $id,
        Module $module,
        array $config = [],
        TestService $testService
    )
    {
        parent::__construct($id, $module, $config);
        $this->service = $testService;
    }

    public function behaviors()
    {
        return [
            /*'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [NotifyPermissionEnum::TEST_READ],
                    ],
                ],
            ],*/
        ];
    }

}
