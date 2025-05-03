<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Professor
 * 
 * @property int $id_professor
 * @property string $nome
 * @property string $cpf
 * 
 * @property Collection|Disciplina[] $disciplinas
 * @property Collection|Turma[] $turmas
 *
 * @package App\Models
 */
class Professor extends Model
{
	use HasFactory;

	protected $table = 'professor';
	protected $primaryKey = 'id_professor';
	public $timestamps = false;

	protected $fillable = [
		'nome',
		'cpf'
	];

	public function disciplina()
	{
		return $this->hasMany(Disciplina::class, 'fk_id_professor');
	}

	public function turma()
	{
		return $this->hasMany(Turma::class, 'fk_id_professor');
	}

	public function usuario()
	{
		return $this->belongsTo(User::class, 'fk_user_id');
	}
}
