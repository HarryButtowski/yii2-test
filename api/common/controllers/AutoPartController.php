<?php

namespace app\api\common\controllers;

use app\api\common\models\AutoPart;
use app\api\common\traits\BaseControllerTrait;
use yii\rest\ActiveController;

/**
 * Class AutoPartController
 * @package app\api\common\controllers
 */
class AutoPartController extends ActiveController
{
    use BaseControllerTrait;

    /**
     * @var string
     */
    public $modelClass = AutoPart::class;
}
