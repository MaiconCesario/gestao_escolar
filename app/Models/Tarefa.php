<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Tarefa
 * 
 * @property int $id_tarefa
 * @property int|null $fk_id_diciplina
 * @property int|null $fk_id_turma
 * @property Carbon|null $data_entrega
 * 
 * @property Disciplina|null $disciplina
 * @property Turma|null $turma
 *
 * @package App\Models
 */
class Tarefa extends Model
{
	use HasFactory;

	protected $table = 'tarefa';
	protected $primaryKey = 'id_tarefa';
	public $timestamps = false;

	protected $casts = [
		'fk_id_diciplina' => 'int',
		'fk_id_turma' => 'int',
		'data_entrega' => 'datetime'
	];

	protected $fillable = [
		'fk_id_diciplina',
		'fk_id_turma',
		'data_entrega'
	];

	public function disciplina()
	{
		return $this->belongsTo(Disciplina::class, 'fk_id_diciplina');
	}

	public function turma()
	{
		return $this->belongsTo(Turma::class, 'fk_id_turma');
	}
}
