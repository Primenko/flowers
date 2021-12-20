<?php

use yii\db\Migration;

/**
 * Class m211220_141914_add_col_hidden
 */
class m211220_141914_add_col_hidden extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('flower_slice', 'date_archive', 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP default null');
        $this->addColumn('flower_slice', 'archive', 'integer default 0');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('flower_slice', 'date_archive');
        $this->dropColumn('flower_slice', 'archive');
    }
}
