<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clientes = array();

        $clientes[] = [
            'codigo' => '1',
            'nome' => 'Laís B.'
        ];

        $clientes[] = [
            'codigo' => '2',
            'nome' => 'João S.'
        ];

        $clientes[] = [
            'codigo' => '3',
            'nome' => 'Maria R.'
        ];

        return Inertia::render('Client/Index', compact('clientes'));
    }
}
