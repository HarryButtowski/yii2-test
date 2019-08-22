<?php

namespace app\api\common\traits;

use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\web\ForbiddenHttpException;

/**
 * Class BaseController
 * @package app\api\common\controllers
 */
trait BaseControllerTrait
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::$app->user->enableSession = false;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::class
        ];

        return $behaviors;
    }

    /**
     * @param $action
     * @param null $model
     * @param array $params
     * @throws ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if (!Yii::$app->user->can('user')) {
            throw new ForbiddenHttpException("You don't have permission to access on this sever");
        }
    }
}