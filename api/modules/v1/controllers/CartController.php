<?php

namespace app\api\modules\v1\controllers;

use app\api\common\interfaces\CartServiceInterface;
use app\api\common\models\Cart;
use app\models\User;
use Yii;
use yii\base\Module;

/**
 * Class CartController
 * @package app\api\moules\v1\controllers
 */
class CartController extends \app\api\common\controllers\CartController
{
    /** @var CartServiceInterface */
    protected $cartService;

    public function __construct(string $id, Module $module, array $config = [], CartServiceInterface $cartService)
    {
        parent::__construct($id, $module, $config);

        $this->cartService = $cartService;
    }

    public function actionIndex()
    {
        /** @var User $user */
        $user = Yii::$app->user->identity;
        $cart = new Cart();

        return $cart->getAutoPartsByUser($user);
    }

    public function actionAdd($autoPartId, $count)
    {
        /** @var User $user */
        $user = Yii::$app->user->identity;

        $model = $this->cartService->add($user, $autoPartId, $count);

        return $model;
    }
}
