<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m190821_113038_addUsers
 */
class m190821_113038_addUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->username = 'admin';
        $user->password = 'admin';
        $user->group = 'admin';
        $user->save();

        for ($i = 1; $i < 6; $i++) {
            $username = 'user' . $i;

            $user = new User([
                'username' => $username,
                'password' => $username,
            ]);

            $user->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190821_113038_addUsers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_113038_addUsers cannot be reverted.\n";

        return false;
    }
    */
}
