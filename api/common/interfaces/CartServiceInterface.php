<?php

namespace app\api\common\interfaces;

use app\api\common\models\AutoPart;
use app\api\common\models\Cart;
use app\models\User;

/**
 * Interface CartServiceInterface
 * @package app\api\common\interfaces
 */
interface CartServiceInterface
{
    /**
     * @param User $user
     * @param AutoPart $autoPart
     * @param float $count
     * @return bool
     */
    public function countIsAvailable(User $user, AutoPart $autoPart, float $count): bool;

    /**
     * @param User $user
     * @param int $autoPartId
     * @param float $count
     * @return Cart
     */
    public function add(User $user, int $autoPartId, float $count): Cart;

    /**
     * @param AutoPart $autoPart
     * @param float $count
     * @return float
     */
    public function getCost(AutoPart $autoPart, float $count): float;
}
