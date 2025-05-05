<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Services\AlunoService;
use App\Http\Requests\StoreAlunoRequest;

class AlunoController extends Controller
{
    protected $alunoservice;

    public function __construct(AlunoService $alunoService)
    {
        $this->alunoService = $alunoService;
    }

    public function index()
    {
        $user = auth()->user();

        return $this->alunoService->visualizarAluno($user);       
    }

    public function store(StoreAlunoRequest $request)
    {
        $user = auth()->user();
        $dados = $request->validated();
        $idTurma = $dados['fk_id_turma'];

        return $this->alunoService->adicionarAluno($dados, $user, $idTurma);
    }
}
