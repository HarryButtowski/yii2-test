<?php

use app\api\common\models\AutoPart;
use yii\db\Migration;

/**
 * Class m190822_010755_addAutoParts
 */
class m190822_010755_addAutoParts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i < 600; $i++) {
            $user = new AutoPart([
                'number' => $faker->unique()->bankAccountNumber,
                'name' => $faker->unique()->text(),
                'count' => $faker->numberBetween(0, 1000),
                'price' => $faker->numberBetween(1, 1000),
            ]);

            $user->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190822_010755_addAutoParts cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190822_010755_addAutoParts cannot be reverted.\n";

        return false;
    }
    */
}
