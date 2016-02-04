<?php

class m140606_101252_init_sms extends CDbMigration
{
    public function up()
    {
        $options = "ENGINE=MyISAM DEFAULT COLLATE='utf8_general_ci' CHARSET=utf8";

		$rules = array(
  			'id' => "pk",
			'year' => "int(4) NOT NULL",
			'month' => "tinyint(2) NOT NULL",
			'day' => "tinyint(2) NOT NULL",
  			'message' => "text COMMENT '消息'",
  			'ctime' => "int(11) NOT NULL DEFAULT '0' COMMENT '创建时间'",
  			'stime' => "int(11) NOT NULL DEFAULT '0' COMMENT '发送时间'",
			'user_id' => "int(11) NOT NULL DEFAULT '0' COMMENT '创建人用户ID'",
  			'status' => "int(11) NOT NULL DEFAULT '0' COMMENT '状态:0待发送,1已发送'",
  			'send_all' => "tinyint(1) DEFAULT '0'  COMMENT '是否发送给所有用户'",
        );
        $this->createTable('{{sms}}', $rules, $options . " COMMENT='系统短信表'");


		$rules = array(
  			'id' => "pk",
  			'sms_id' => "int(11) NOT NULL DEFAULT '0' COMMENT '短信ID'",
  			'user_id' => "int(11) NOT NULL DEFAULT '0' COMMENT '用户ID'",
		);
        $this->createTable('{{sms_to_user}}', $rules, $options . " COMMENT='系统短信发送用户表'");

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
        	$this->dropTable('{{sms}}');
        	$this->dropTable('{{sms_to_user}}');
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
