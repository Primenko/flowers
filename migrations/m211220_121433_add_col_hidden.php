<?php

use yii\db\Migration;

/**
 * Class m211220_121433_add_col_hidden
 */
class m211220_121433_add_col_hidden extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('flowers', 'archive', 'integer default 0');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('flowers', 'archive');
    }
}
