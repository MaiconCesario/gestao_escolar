<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class EnderecoResponsavel
 * 
 * @property int $id_endereco_responsavel
 * @property string $logradouro
 * @property string $numero
 * @property string|null $complemento
 * @property string|null $bairro
 * @property string|null $cidade
 * @property string|null $estado
 * @property int|null $fk_id_responsavel
 * 
 * @property Responsavel|null $responsavel
 *
 * @package App\Models
 */
class EnderecoResponsavel extends Model
{
	use HasFactory;

	protected $table = 'endereco_responsavel';
	protected $primaryKey = 'id_endereco_responsavel';
	public $timestamps = false;

	protected $casts = [
		'fk_id_responsavel' => 'int'
	];

	protected $fillable = [
		'logradouro',
		'numero',
		'complemento',
		'bairro',
		'cidade',
		'estado',
		'fk_id_responsavel'
	];

	public function responsavel()
	{
		return $this->belongsTo(Responsavel::class, 'fk_id_responsavel');
	}
}
