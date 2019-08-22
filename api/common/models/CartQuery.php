<?php

namespace app\api\common\models;

use app\models\User;
use yii\db\ActiveQuery;

/**
 * Class CartQuery
 * @package app\api\models
 */
class CartQuery extends ActiveQuery
{
    /**
     * @param User $user
     * @return $this
     */
    public function onUser(User $user)
    {
        return $this->andWhere(['user_id' => $user->id]);
    }
}
