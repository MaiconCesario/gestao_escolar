<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Aluno
 * 
 * @property int $id_aluno
 * @property string $nome
 * @property Carbon $data_nascimento
 * @property string $sexo
 * @property string $cpf
 * @property string $email
 * @property Carbon|null $data_matricula
 * 
 * @property Collection|Responsavel[] $responsavels
 * @property Collection|ConvocacaoRecuperacao[] $convocacao_recuperacaos
 * @property Collection|EnderecoAluno[] $endereco_alunos
 * @property Collection|NotaEscolar[] $nota_escolars
 * @property Collection|Ocorrencium[] $ocorrencia
 * @property Collection|Presenca[] $presencas
 *
 * @package App\Models
 */
class Aluno extends Model
{
	use HasFactory;

	protected $table = 'aluno';
	protected $primaryKey = 'id_aluno';
	public $timestamps = false;

	protected $casts = [
		'data_nascimento' => 'datetime',
		'data_matricula' => 'datetime'
	];

	protected $fillable = [
		'nome',
		'data_nascimento',
		'sexo',
		'cpf',
		'email',
		'data_matricula'
	];

	public function responsavel()
	{
		return $this->belongsToMany(Responsavel::class, 'aluno_responsavel', 'fk_id_aluno', 'fk_id_responsavel')
					->withPivot('id_aluno_responsavel');
	}

	public function convocacao_recuperacao()
	{
		return $this->hasMany(ConvocacaoRecuperacao::class, 'fk_id_aluno');
	}

	public function endereco_aluno()
	{
		return $this->hasMany(EnderecoAluno::class, 'fk_id_aluno');
	}

	public function nota_escolar()
	{
		return $this->hasMany(NotaEscolar::class, 'fk_id_aluno');
	}

	public function ocorrencia()
	{
		return $this->hasMany(Ocorrencium::class, 'fk_id_aluno');
	}

	public function presenca()
	{
		return $this->hasMany(Presenca::class, 'fk_id_aluno');
	}

	public function turma()
	{
		return $this->belongsTo(Turma::class, 'fk_id_turma', 'id_turma');
	}
}
