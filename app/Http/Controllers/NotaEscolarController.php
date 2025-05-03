<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaEscolar;
use App\Models\Disciplina;
use App\Modesl\Professor;
use App\Services\NotaService;
use App\Http\Requests\UpdateNotaRequest;
use App\Http\Requests\StoreNotaRequest;

class NotaEscolarController extends Controller
{
    protected $notaservice;

    public function __construct(NotaService $notaService)
    {
        $this->notaService = $notaService;
    }

    public function index()
    {
        $user = auth()->user();
        return $this->notaService->visualizarNota($user);
    }

    public function store(StoreNotaRequest $request, $idAluno, $idDisciplina)
    {
        $resultado = $this->notaService->adicionarNota($request->only('nota1','nota2','nota3','nota4'), auth()->user(), $idAluno, $idDisciplina);

        if(!$resultado['status'])
        {
            return response()->json(['erro' => $resultado['mensagem']], $resultado['code']);
        }

        return response()->json(['mensagem' => $resultado['mensagem']], 200);
    }

    public function update(UpdateNotaRequest $request, $idAluno, $idDisciplina)
    {
        $resultado = $this->notaService->atualizarNota($request->only(['nota1', 'nota2', 'nota3', 'nota4']), auth()->user(), $idAluno, $idDisciplina); 

        if(!$resultado['status'])
        {
            return response()->json(['erro' => $resultado['mensagem']], $resultado['code']);
        }

        return response()->json(['mensagem' => $resultado['mensagem']], 200);
    }

    public function updateParcial(UpdateNotaRequest $request, $idAluno, $idDisciplina)
    {
        $resultado = $this->update($request, $idAluno, $idDisciplina);
    }
}
