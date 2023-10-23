<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m230912_082221_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
