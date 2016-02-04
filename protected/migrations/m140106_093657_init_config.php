<?php

class m140106_093657_init_config extends CDbMigration
{
    public function up()
    {
        $options = "ENGINE=MyISAM DEFAULT COLLATE='utf8_general_ci' CHARSET=utf8";

		$rules = array(
  			'id' => "pk",
  			'section' => "varchar(255) NOT NULL DEFAULT 'system'",
  			'_key' => "varchar(255) NOT NULL",
  			'_value' => "text NOT NULL",
  			'_comment' => "varchar(255) DEFAULT ''",
  			'is_deleted' => "tinyint(1) DEFAULT '0'",
        );
        $this->createTable('{{config}}', $rules, $options . " COMMENT='系统配置文档'");

        //$this->alterColumn('{{table_name}}','column_name','type PRIMARY KEY');
        //$this->execute('alter table example add column email varchar(255);');
        //Yii::app()->db->createCommand('alter table example add column email varchar(255);')->execute();

        //public void addColumn(string $table, string $column, string $type)
        //public void addForeignKey(string $name, string $table, string $columns, string $refTable, string $refColumns, string $delete=NULL, string $update=NULL)
        //public void addPrimaryKey(string $name, string $table, string $columns)
        //public void alterColumn(string $table, string $column, string $type)
        //public void createIndex(string $name, string $table, string $column, boolean $unique=false)
        //public void createTable(string $table, array $columns, string $options=NULL)
        //public void dropColumn(string $table, string $column)
        //public void dropForeignKey(string $name, string $table)
        //public void dropIndex(string $name, string $table)
        //public void dropPrimaryKey(string $name, string $table)
        //public void dropTable(string $table)
        //public void refreshTableSchema(string $table)
        //public void renameColumn(string $table, string $name, string $newName)
        //public void renameTable(string $table, string $newName)
        //public void truncateTable(string $table)
    }

    public function down()
    {
        $transaction = $this->getDbConnection()->beginTransaction();
        try {
            //$this->renameTable('{{menu}}', '{{menu_backup}}');
        	$this->dropTable('{{config}}');
            $transaction->commit();
        } catch (Exception $e) {
            echo "Exception: " . $e->getMessage()."\n";
            $transaction->rollback();
            return false;
        }
        return false;
    }

    /*
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
