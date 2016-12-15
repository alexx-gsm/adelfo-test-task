<?php

use yii\db\Migration;

class m161214_170624_createTableNews extends Migration
{
    public function up()
    {
        $this->createTable('news', [
            'id'        => $this->primaryKey(),
            'title'     => $this->string()->notNull(),
            'image'     => $this->string()->notNull(),
            'text'      => $this->text()->notNull(),
            '__user_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
    }
}
