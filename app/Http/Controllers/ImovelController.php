<?php

namespace App\Http\Controllers;

use Exception;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Imovel\ImovelStoreRequest;
use App\Http\Requests\Imovel\ImovelUpdateRequest;

use App\Models\Imovel;

class ImovelController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::where('excluido', '0')->get();

        return Inertia::render('Imovel/Index', compact('imoveis'));
    }

    public function new()
    {
        return Inertia::render('Imovel/Create-Edit');
    }

    public function store(ImovelStoreRequest $request): RedirectResponse
    {
        try {
            Imovel::create([
                'codigo' => $request['codigo'],
                'nome' => $request['nome'],
                'tipo' => $request['tipo'],
                'excluido' => '0',
                'id_user_create' =>  auth()->user()->id,
                'create_at' => date('Y-m-d H:i'),
                'update_at' => date('Y-m-d H:i')
            ]);
            return back()->with('alert-success', 'Imóvel cadastrado com sucesso');
        } catch (Exception $e) {
            return back()->with('alert-danger', 'Não foi possível cadastrar o imóvel');
        }

        // return Redirect::route('imovel.index');
    }

    public function edit($id)
    {
        $imovel = Imovel::find($id);
        return Inertia::render('Imovel/Create-Edit', compact('imovel'));
    }

    public function update($id, ImovelUpdateRequest $request): RedirectResponse
    {
        try {
            Imovel::find($id)->update([
                'codigo' => $request['codigo'],
                'nome' => $request['nome'],
                'tipo' => $request['tipo'],
                'descricao' => $request['descricao'],
                'cep' => $request['cep'],
                'estado' => $request['estado'],
                'cidade' => $request['cidade'],
                'bairro' => $request['bairro'],
                'endereco' => $request['endereco'],
                'numero' => $request['numero'],
                'telefone' => $request['telefone'],
                'excluido' => $request['excluido'],
                'id_user_update' =>  auth()->user()->id,
                'excluido' => '0',
                'update_at' => date('Y-m-d H:i')
            ]);
            return back()->with('alert-success', 'Imóvel atualizado com sucesso');
        } catch (Exception $e) {
            return back()->with('alert-danger', 'Não foi possível atualizar o imóvel');
        }

        // return Redirect::route('profile.edit');
    }

    public function destroy($id)
    {
        try {
            $return = Imovel::find($id)->update([
                'excluido' => '1',
                'id_user_update' =>  auth()->user()->id,
                'update_at' => date('Y-m-d H:i')
            ]);

            return response()->json([
                'status' => $return,
                'message' => $return  ? 'Imóvel excluído com sucesso' : 'Não foi possível excluído o imóvel',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Não foi possível excluído o imóvel, contate o Administrador"
            ]);
        }
    }
}
