<?php


use Phinx\Migration\AbstractMigration;

class CreateUserRoleTable extends AbstractMigration
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
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $role_user = $this->table('role_user');
        $role_user->addColumn('user_id', 'integer', ['limit'=> 11 ,'signed' => false, 'null' => true])
            ->addColumn('role_id', 'integer', ['limit'=> 11 ,'signed' => false, 'null' => true])
            ->addColumn('created_at', 'timestamp', ['null' => true])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->addIndex('user_id', [
                'unique' => true
            ])
            ->addIndex('role_id', [
                'unique' => true
            ])
            ->addForeignKey('user_id', 'users', 'id',
                ['delete' => 'CASCADE'], ['update' => 'NO_ACTION'])
            ->addForeignKey('role_id', 'roles', 'id',
                ['delete' => 'CASCADE'], ['update' => 'NO_ACTION'])
            ->create();
    }
}
