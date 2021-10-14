<?php

use yii\db\Migration;

/**
 * Class m211007_130950_create_table_flowers
 */
class m211007_130950_create_table_flowers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('flowers', [
            'id' => 'INT(6) AUTO_INCREMENT PRIMARY KEY',
            'name_en' =>'VARCHAR(30) NOT NULL',
            'name_ru' =>'VARCHAR(30) NOT NULL',
            'date_added' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->createTable('sliced_flowers', [
            'id' => 'INT(6) AUTO_INCREMENT PRIMARY KEY',
            'flowers_id' =>'int(6) NOT NULL',
            'count' =>'int(30) NOT NULL',
            'user_id' => 'int(30) NOT NULL',
            'date_added' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->createTable('users', [
            'id' => 'INT(6) AUTO_INCREMENT PRIMARY KEY',
            'first_name' =>'VARCHAR(30) NOT NULL',
            'last_name' =>'VARCHAR(30) NOT NULL',
            'password' => 'VARCHAR(30) NOT NULL',
            'role' => 'VARCHAR(30)',
            'date_added' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->createTable('flower_slice', [
            'id' => 'INT(6) AUTO_INCREMENT PRIMARY KEY',
            'flower_id' =>'VARCHAR(30) NOT NULL',
            'cnt_slice' =>'int(6) NOT NULL',
            'user_id' => 'int(30) NOT NULL',
            'date_added' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->createTable('flower_slice_planting', [
            'id' => 'INT(6) AUTO_INCREMENT PRIMARY KEY',
            'type' =>'int(3) NOT NULL',
            'flower_id' =>'VARCHAR(30) NOT NULL',
            'cnt_slice' =>'int(6) NOT NULL',
            'user_id' => 'int(30) NOT NULL',
            'date_added' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('flowers');
        $this->dropTable('sliced_flowers');
        $this->dropTable('users');
        $this->dropTable('flower_slice');
        $this->dropTable('flower_slice_planting');
    }
}
