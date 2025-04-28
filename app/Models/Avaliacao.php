<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Avaliacao
 * 
 * @property int $id_avaliacao
 * @property int|null $fk_id_disciplina
 * @property int|null $fk_id_turma
 * @property Carbon|null $data_avaliacao
 * @property string|null $tipo_avaliacao
 * 
 * @property Disciplina|null $disciplina
 * @property Turma|null $turma
 *
 * @package App\Models
 */
class Avaliacao extends Model
{
	use HasFactory;

	protected $table = 'avaliacao';
	protected $primaryKey = 'id_avaliacao';
	public $timestamps = false;

	protected $casts = [
		'fk_id_disciplina' => 'int',
		'fk_id_turma' => 'int',
		'data_avaliacao' => 'datetime'
	];

	protected $fillable = [
		'fk_id_disciplina',
		'fk_id_turma',
		'data_avaliacao',
		'tipo_avaliacao'
	];

	public function disciplina()
	{
		return $this->belongsTo(Disciplina::class, 'fk_id_disciplina');
	}

	public function turma()
	{
		return $this->belongsTo(Turma::class, 'fk_id_turma');
	}
}
