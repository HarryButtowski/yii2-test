<?php

namespace app\api\common\services;

use app\api\common\models\AutoPart;
use app\api\common\interfaces\CartServiceInterface;
use app\api\common\models\Cart;
use app\models\User;
use yii\web\ServerErrorHttpException;

/**
 * Class CartService
 * @package app\api\services
 */
class CartService implements CartServiceInterface
{
    /**
     * @inheritdoc
     */
    public function countIsAvailable(User $user, AutoPart $autoPart, float $count): bool
    {
        if ($count <= 0) {
            return false;
        }

        /** @var Cart $cart */
        $cart = Cart::find()->onUser($user)->andWhere(['auto_part_id' => $autoPart->id])->one();
        $currentCount = (float)$cart->count;

        return $autoPart && ($currentCount + $count) < $autoPart->count;
    }

    /**
     * @inheritdoc
     * @throws ServerErrorHttpException
     */
    public function add(User $user, int $autoPartId, float $count): Cart
    {
        $autoPart = AutoPart::findOne($autoPartId);

        if (!$this->countIsAvailable($user, $autoPart, $count)) {
            throw new ServerErrorHttpException('Count of auto part not available.');
        }

        /** @var Cart $cart */
        $cart = Cart::find()->onUser($user)->andWhere(['auto_part_id' => $autoPartId])->one();

        if ($cart) {
            $count = $cart->count + $count;
        } else {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->auto_part_id = $autoPartId;
        }

        $cart->count = $count;
        $cart->amount = $this->getCost($autoPart, $count);

        if ($cart->save() === false && !$cart->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }

        return $cart;
    }

    /**
     * @param AutoPart $autoPart
     * @param float $count
     * @return float
     */
    public function getCost(AutoPart $autoPart, float $count): float
    {
        return round(bcmul($autoPart->price, $count, 2), 2, PHP_ROUND_HALF_UP);
    }
}
