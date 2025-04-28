<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Disciplina
 * 
 * @property int $id_disciplina
 * @property string|null $nome
 * @property string|null $descricao
 * @property int|null $fk_id_professor
 * 
 * @property Professor|null $professor
 * @property Collection|Avaliacao[] $avaliacaos
 * @property Collection|ConvocacaoRecuperacao[] $convocacao_recuperacaos
 * @property Collection|HorarioEscolar[] $horario_escolars
 * @property Collection|NotaEscolar[] $nota_escolars
 * @property Collection|Tarefa[] $tarefas
 * @property Collection|Turma[] $turmas
 *
 * @package App\Models
 */
class Disciplina extends Model
{
	use HasFactory;

	protected $table = 'disciplina';
	protected $primaryKey = 'id_disciplina';
	public $timestamps = false;

	protected $casts = [
		'fk_id_professor' => 'int'
	];

	protected $fillable = [
		'nome',
		'descricao',
		'fk_id_professor'
	];

	public function professor()
	{
		return $this->belongsTo(Professor::class, 'fk_id_professor');
	}

	public function avaliacao()
	{
		return $this->hasMany(Avaliacao::class, 'fk_id_disciplina');
	}

	public function convocacao_recuperacao()
	{
		return $this->hasMany(ConvocacaoRecuperacao::class, 'fk_id_disciplina');
	}

	public function horario_escolar()
	{
		return $this->hasMany(HorarioEscolar::class, 'fk_id_disciplina');
	}

	public function nota_escolar()
	{
		return $this->hasMany(NotaEscolar::class, 'fk_id_disciplina');
	}

	public function tarefa()
	{
		return $this->hasMany(Tarefa::class, 'fk_id_diciplina');
	}

	public function turma()
	{
		return $this->hasMany(Turma::class, 'fk_id_disciplina');
	}
}