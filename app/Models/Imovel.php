<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = 'imoveis';
    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo',
        'nome',
        'tipo',
        'descricao',
        'cep',
        'estado',
        'cidade',
        'bairro',
        'endereco',
        'numero',
        'telefone',
        'excluido',
        'id_user_create',
        'id_user_update',
        'created_at',
        'updated_at',
    ];
}
