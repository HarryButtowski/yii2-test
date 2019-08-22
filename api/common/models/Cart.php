<?php

namespace app\api\common\models;

use app\models\User;
use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $user_id
 * @property int $auto_part_id
 * @property double $count
 * @property double $amount
 *
 * @property User $user
 * @property AutoPart $autoPart
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @return CartQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new CartQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'auto_part_id', 'count', 'amount'], 'required'],
            [['user_id', 'auto_part_id'], 'integer'],
            [['count', 'amount'], 'number'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['auto_part_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoPart::class, 'targetAttribute' => ['auto_part_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'auto_part_id' => 'Auto Part ID',
            'count' => 'Count',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoPart()
    {
        return $this->hasOne(AutoPart::className(), ['id' => 'auto_part_id']);
    }

    /**
     * @param User $user
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAutoPartsByUser(User $user)
    {
        return static::find()
            ->select('cart.id, auto_part.name, cart.count, cart.amount')
            ->where(['user_id' => $user->id])
            ->joinWith('autoPart')
            ->asArray()
            ->all();
    }
}
