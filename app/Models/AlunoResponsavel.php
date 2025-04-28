<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class AlunoResponsavel
 * 
 * @property int $id_aluno_responsavel
 * @property int|null $fk_id_aluno
 * @property int|null $fk_id_responsavel
 * 
 * @property Aluno|null $aluno
 * @property Responsavel|null $responsavel
 *
 * @package App\Models
 */
class AlunoResponsavel extends Model
{
	use HasFactory;

	protected $table = 'aluno_responsavel';
	protected $primaryKey = 'id_aluno_responsavel';
	public $timestamps = false;

	protected $casts = [
		'fk_id_aluno' => 'int',
		'fk_id_responsavel' => 'int'
	];

	protected $fillable = [
		'fk_id_aluno',
		'fk_id_responsavel'
	];

	public function aluno()
	{
		return $this->belongsTo(Aluno::class, 'fk_id_aluno');
	}

	public function responsavel()
	{
		return $this->belongsTo(Responsavel::class, 'fk_id_responsavel');
	}
}
