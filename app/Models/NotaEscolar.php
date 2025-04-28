<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class NotaEscolar
 * 
 * @property int $id_nota
 * @property int|null $fk_id_aluno
 * @property int|null $fk_id_disciplina
 * @property float|null $nota1
 * @property float|null $nota2
 * @property float|null $nota3
 * @property float|null $nota4
 * @property float|null $nota_final
 * 
 * @property Aluno|null $aluno
 * @property Disciplina|null $disciplina
 *
 * @package App\Models
 */
class NotaEscolar extends Model
{
	use HasFactory;

	protected $table = 'nota_escolar';
	protected $primaryKey = 'id_nota';
	public $timestamps = false;

	protected $casts = [
		'fk_id_aluno' => 'int',
		'fk_id_disciplina' => 'int',
		'nota1' => 'float',
		'nota2' => 'float',
		'nota3' => 'float',
		'nota4' => 'float',
		'nota_final' => 'float'
	];

	protected $fillable = [
		'fk_id_aluno',
		'fk_id_disciplina',
		'nota1',
		'nota2',
		'nota3',
		'nota4',
		'nota_final'
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
