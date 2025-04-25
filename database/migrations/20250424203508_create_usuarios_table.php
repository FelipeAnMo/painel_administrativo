<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUsuariosTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up(): void
    {
        $this->table('usuarios')
            ->addColumn('nome', 'string')
            ->addColumn('email', 'string')
            ->addColumn('senha', 'string')
            ->addColumn('data_criacao', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();

        $this->table('usuarios')->insert([
            [
                'nome' => 'Admin',
                'email' => 'admin@admin.com',
                'senha' => 'admin',
            ],
        ])->saveData();
    }

    public function down(): void
    {
        $this->table('usuarios')->drop()->save();
    }

}
