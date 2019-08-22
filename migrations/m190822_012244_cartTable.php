<?php

use yii\db\Migration;

/**
 * Class m190822_012244_cartTable
 */
class m190822_012244_cartTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cart', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'auto_part_id' => $this->integer()->notNull(),
            'count' => $this->float()->notNull(),
            'amount' => $this->float()->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-cart-user_id',
            'cart',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-cart-author_id',
            'cart',
            'user_id',
            'user',
            'id',
            'NO ACTION'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-cart-auto_part_id',
            'cart',
            'auto_part_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-post-auto_part_id',
            'cart',
            'auto_part_id',
            'auto_part',
            'id',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190822_012244_cartTable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190822_012244_cartTable cannot be reverted.\n";

        return false;
    }
    */
}
