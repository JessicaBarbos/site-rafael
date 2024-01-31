<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clientes[0] = [
            'codigo' => '1',
            'nome' => 'Laís B.'
        ];
        return Inertia::render('Client/Index', compact('clientes'));
    }
}
