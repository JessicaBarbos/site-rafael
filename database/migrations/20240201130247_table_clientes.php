<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TableClientes extends AbstractMigration
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
    public function change(): void
    {

        $table = $this->table('clientes');
        $table->addColumn('nome', 'string', ['limit' => 100])
            ->addColumn('email', 'string', ['limit' => 40])
            ->addColumn('cpf', 'string', ['limit' => 20])
            ->addColumn('cep', 'string', ['limit' => 50])
            ->addColumn('estado', 'string', ['limit' => 10])
            ->addColumn('cidade', 'string', ['limit' => 500])
            ->addColumn('bairro', 'string', ['limit' => 500])
            ->addColumn('endereco', 'string', ['limit' => 500])
            ->addColumn('numero', 'string', ['limit' => 10])
            ->addColumn('telefone', 'string', ['limit' => 50])
            ->addColumn('cel', 'string', ['limit' => 50])
            ->addColumn('site', 'string', ['limit' => 100])
            ->addColumn('id_group', 'integer', ['null' => true])
            ->addColumn('id_type_user', 'integer', ['null' => true])
            ->addColumn('id_user_create', 'integer', ['null' => true])
            ->addColumn('id_user_update', 'integer', ['null' => true])
            ->addColumn('excluido', 'integer', ['default' => 0])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();
    }
}
