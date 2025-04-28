<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class ConvocacaoRecuperacao
 * 
 * @property int $id_convocacao
 * @property int|null $fk_id_aluno
 * @property int|null $fk_id_disciplina
 * @property Carbon|null $data_convocacao
 * 
 * @property Aluno|null $aluno
 * @property Disciplina|null $disciplina
 *
 * @package App\Models
 */
class ConvocacaoRecuperacao extends Model
{
	use HasFactory;

	protected $table = 'convocacao_recuperacao';
	protected $primaryKey = 'id_convocacao';
	public $timestamps = false;

	protected $casts = [
		'fk_id_aluno' => 'int',
		'fk_id_disciplina' => 'int',
		'data_convocacao' => 'datetime'
	];

	protected $fillable = [
		'fk_id_aluno',
		'fk_id_disciplina',
		'data_convocacao'
	];

	public function aluno()
	{
		return $this->belongsTo(Aluno::class, 'fk_id_aluno');
	}

	public function disciplina()
	{
		return $this->belongsTo(Disciplina::class, 'fk_id_disciplina');
	}
}
