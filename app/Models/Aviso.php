<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Aviso
 * 
 * @property int $id_aviso
 * @property string|null $titulo
 * @property string|null $mensagem
 * @property Carbon|null $data_emissao
 *
 * @package App\Models
 */
class Aviso extends Model
{
	use HasFactory;

	protected $table = 'aviso';
	protected $primaryKey = 'id_aviso';
	public $timestamps = false;

	protected $casts = [
		'data_emissao' => 'datetime'
	];

	protected $fillable = [
		'titulo',
		'mensagem',
		'data_emissao'
	];
}
