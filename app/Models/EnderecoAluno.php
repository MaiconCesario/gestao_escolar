<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class EnderecoAluno
 * 
 * @property int $id_endereco_aluno
 * @property string $logradouro
 * @property string $numero
 * @property string|null $complemento
 * @property string|null $bairro
 * @property string|null $cidade
 * @property string|null $estado
 * @property int|null $fk_id_aluno
 * 
 * @property Aluno|null $aluno
 *
 * @package App\Models
 */
class EnderecoAluno extends Model
{
	use HasFactory;

	protected $table = 'endereco_aluno';
	protected $primaryKey = 'id_endereco_aluno';
	public $timestamps = false;

	protected $casts = [
		'fk_id_aluno' => 'int'
	];

	protected $fillable = [
		'logradouro',
		'numero',
		'complemento',
		'bairro',
		'cidade',
		'estado',
		'fk_id_aluno'
	];

	public function aluno()
	{
		return $this->belongsTo(Aluno::class, 'fk_id_aluno');
	}
}
