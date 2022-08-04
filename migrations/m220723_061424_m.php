<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220723_061424_m
 */
class m220723_061424_m extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('checking_urls', [
            'id' => $this->primaryKey(),
            'url' => $this->string()->notNull()->unique(),
            'check_interval' => $this->integer()->notNull(),
            'retries_number' => $this->integer()->notNull(),
            'creation_date' => $this->date()->notNull(),
        ]);

        $this->createTable('checks', [
            'id' => $this->primaryKey(),
            'url_id' => $this->bigInteger()->notNull(),
            'check_date' => $this->date()->notNull(),
            'status_code' => $this->integer()->notNull(),
            'attempt_number' => $this->integer()->notNull(),
            'check_time' => $this->time()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m220723_061424_m cannot be reverted.\n";

      return false;
      }
     */
}
