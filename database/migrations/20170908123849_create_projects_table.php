<?php


use Phinx\Migration\AbstractMigration;

class CreateProjectsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $projects = $this->table('projects');

        $projects->addColumn('name', 'string')
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('starts_at', 'timestamp', ['null' => true])
            ->addColumn('ends_at', 'timestamp', ['null' => true])
            ->addColumn('income_expected', 'decimal', ['default' => 0])
            ->addColumn('income_gained', 'decimal', ['default' => 0])
            ->addColumn('user_id', 'integer')
            ->addForeignKey('user_id', 'users', 'id')
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->save();

    }

    public function down()
    {
        $this->dropTable('projects');
    }
}
