<?php

namespace app\api\common\models;

use Yii;

/**
 * This is the model class for table "auto_part".
 *
 * @property int $id
 * @property string $number
 * @property string $name
 * @property double $count
 * @property double $price
 */
class AutoPart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_part';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count', 'price'], 'number'],
            [['number', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'name' => 'Name',
            'count' => 'Count',
            'price' => 'Price',
        ];
    }
}
