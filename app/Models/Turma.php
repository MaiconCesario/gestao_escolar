<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Turma
 * 
 * @property int $id_turma
 * @property string|null $nome_turma
 * @property int|null $fk_id_disciplina
 * @property int|null $fk_id_professor
 * @property string|null $turno
 * @property int|null $ano
 * 
 * @property Disciplina|null $disciplina
 * @property Professor|null $professor
 * @property Collection|Avaliacao[] $avaliacaos
 * @property Collection|HorarioEscolar[] $horario_escolars
 * @property Collection|Tarefa[] $tarefas
 *
 * @package App\Models
 */
class Turma extends Model
{
	use HasFactory;

	protected $table = 'turma';
	protected $primaryKey = 'id_turma';
	public $timestamps = false;

	protected $casts = [
		'fk_id_disciplina' => 'int',
		'fk_id_professor' => 'int',
		'ano' => 'int'
	];

	protected $fillable = [
		'nome_turma',
		'fk_id_disciplina',
		'fk_id_professor',
		'turno',
		'ano'
	];

	public function disciplina()
	{
		return $this->belongsTo(Disciplina::class, 'fk_id_disciplina');
	}

	public function professor()
	{
		return $this->belongsTo(Professor::class, 'fk_id_professor');
	}

	public function avaliacao()
	{
		return $this->hasMany(Avaliacao::class, 'fk_id_turma');
	}

	public function horario_escolar()
	{
		return $this->hasMany(HorarioEscolar::class, 'fk_id_turma');
	}

	public function tarefa()
	{
		return $this->hasMany(Tarefa::class, 'fk_id_turma');
	}
}
