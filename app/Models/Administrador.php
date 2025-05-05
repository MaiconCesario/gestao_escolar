<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    protected $table = 'administradores';
    protected $primarykey = 'id_administrador';
    protected $fillable = ['fk_user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }
}
