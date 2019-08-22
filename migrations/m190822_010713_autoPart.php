<?php

use yii\db\Migration;

/**
 * Class m190822_010713_autoPart
 */
class m190822_010713_autoPart extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auto_part', [
            'id' => $this->primaryKey(),
            'number' => $this->string(),
            'name' => $this->string(),
            'count' => $this->float()->notNull()->defaultValue(0),
            'price' => $this->float()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190822_010713_autoPart cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190822_010713_autoPart cannot be reverted.\n";

        return false;
    }
    */
}
