<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Responsavel
 * 
 * @property int $id_responsavel
 * @property string $nome
 * @property string $cpf
 * @property string $email
 * 
 * @property Collection|Aluno[] $alunos
 * @property Collection|EnderecoResponsavel[] $endereco_responsavels
 *
 * @package App\Models
 */
class Responsavel extends Model
{
	use HasFactory;

	protected $table = 'responsavel';
	protected $primaryKey = 'id_responsavel';
	public $timestamps = false;

	protected $fillable = [
		'nome',
		'cpf',
		'email'
	];

	public function alunos()
	{
		return $this->belongsToMany(Aluno::class, 'aluno_responsavel', 'fk_id_responsavel', 'fk_id_aluno')
					->withPivot('id_aluno_responsavel');
	}

	public function endereco_responsavel()
	{
		return $this->hasMany(EnderecoResponsavel::class, 'fk_id_responsavel');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'fk_user_id');
	}

}
