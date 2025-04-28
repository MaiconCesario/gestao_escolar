<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Presenca
 * 
 * @property int $id_presenca
 * @property int|null $fk_id_aluno
 * @property int|null $fk_id_horario
 * @property bool|null $presente
 * @property Carbon|null $data_presenca
 * 
 * @property Aluno|null $aluno
 * @property HorarioEscolar|null $horario_escolar
 *
 * @package App\Models
 */
class Presenca extends Model
{
	use HasFactory;

	protected $table = 'presenca';
	protected $primaryKey = 'id_presenca';
	public $timestamps = false;

	protected $casts = [
		'fk_id_aluno' => 'int',
		'fk_id_horario' => 'int',
		'presente' => 'bool',
		'data_presenca' => 'datetime'
	];

	protected $fillable = [
		'fk_id_aluno',
		'fk_id_horario',
		'presente',
		'data_presenca'
	];

	public function aluno()
	{
		return $this->belongsTo(Aluno::class, 'fk_id_aluno');
	}

	public function horario_escolar()
	{
		return $this->belongsTo(HorarioEscolar::class, 'fk_id_horario');
	}
}
