<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class HorarioEscolar
 * 
 * @property int $id_horario
 * @property int|null $fk_id_turma
 * @property string|null $dia_semana
 * @property Carbon|null $hora_inicio
 * @property Carbon|null $hora_fim
 * @property int|null $fk_id_disciplina
 * 
 * @property Disciplina|null $disciplina
 * @property Turma|null $turma
 * @property Collection|Presenca[] $presencas
 *
 * @package App\Models
 */
class HorarioEscolar extends Model
{
	use HasFactory;

	protected $table = 'horario_escolar';
	protected $primaryKey = 'id_horario';
	public $timestamps = false;

	protected $casts = [
		'fk_id_turma' => 'int',
		'hora_inicio' => 'datetime',
		'hora_fim' => 'datetime',
		'fk_id_disciplina' => 'int'
	];

	protected $fillable = [
		'fk_id_turma',
		'dia_semana',
		'hora_inicio',
		'hora_fim',
		'fk_id_disciplina'
	];

	public function disciplina()
	{
		return $this->belongsTo(Disciplina::class, 'fk_id_disciplina');
	}

	public function turma()
	{
		return $this->belongsTo(Turma::class, 'fk_id_turma');
	}

	public function presenca()
	{
		return $this->hasMany(Presenca::class, 'fk_id_horario');
	}
}
