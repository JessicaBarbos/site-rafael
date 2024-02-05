<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableImovel extends AbstractMigration
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
        $table = $this->table('imoveis');
        $table->addColumn('nome', 'string', ['limit' => 100])
            ->addColumn('codigo', 'string', ['limit' => 100])
            ->addColumn('tipo', 'string', ['limit' => 5, 'null' => true])
            ->addColumn('descricao', 'text', ['null' => true])
            ->addColumn('cep', 'string', ['limit' => 50, 'null' => true])
            ->addColumn('estado', 'string', ['limit' => 10, 'null' => true])
            ->addColumn('cidade', 'string', ['limit' => 500, 'null' => true])
            ->addColumn('bairro', 'string', ['limit' => 500, 'null' => true])
            ->addColumn('endereco', 'string', ['limit' => 500, 'null' => true])
            ->addColumn('numero', 'string', ['limit' => 10, 'null' => true])
            ->addColumn('telefone', 'string', ['limit' => 50, 'null' => true])
            ->addColumn('excluido', 'integer', ['default' => 0, 'null' => true])
            ->addColumn('id_user_create', 'integer', ['null' => true])
            ->addColumn('id_user_update', 'integer', ['null' => true])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();
    }
}
