<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class CalendarioEscolar
 * 
 * @property int $id_calendario
 * @property string|null $evento
 * @property Carbon|null $data_inicio
 * @property Carbon|null $data_fim
 * @property string|null $descrica
 *
 * @package App\Models
 */
class CalendarioEscolar extends Model
{
	use HasFactory;

	protected $table = 'calendario_escolar';
	protected $primaryKey = 'id_calendario';
	public $timestamps = false;

	protected $casts = [
		'data_inicio' => 'datetime',
		'data_fim' => 'datetime'
	];

	protected $fillable = [
		'evento',
		'data_inicio',
		'data_fim',
		'descrica'
	];
}
