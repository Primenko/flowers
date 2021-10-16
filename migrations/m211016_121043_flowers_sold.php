<?php

use yii\db\Migration;

/**
 * Class m211016_121043_flowers_sold
 */
class m211016_121043_flowers_sold extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('flower_slice', 'type','int(6) NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('flower_slice','type');
    }
}
