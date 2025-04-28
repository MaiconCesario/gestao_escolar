<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Ocorrencium
 * 
 * @property int $id_ocorrencia
 * @property int|null $fk_id_aluno
 * @property Carbon|null $data_ocorrencia
 * @property Carbon|null $data_fim
 * @property string|null $descricao
 * 
 * @property Aluno|null $aluno
 *
 * @package App\Models
 */
class Ocorrencium extends Model
{
	use HasFactory;

	protected $table = 'ocorrencia';
	protected $primaryKey = 'id_ocorrencia';
	public $timestamps = false;

	protected $casts = [
		'fk_id_aluno' => 'int',
		'data_ocorrencia' => 'datetime',
		'data_fim' => 'datetime'
	];

	protected $fillable = [
		'fk_id_aluno',
		'data_ocorrencia',
		'data_fim',
		'descricao'
	];

	public function aluno()
	{
		return $this->belongsTo(Aluno::class, 'fk_id_aluno');
	}
}
