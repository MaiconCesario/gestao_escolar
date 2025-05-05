<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrador;
use App\Models\User;

class AdministradorSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::find(30);

        if ($user && $user->tipo === 'administrador') {
            Administrador::firstOrCreate([
                'fk_user_id' => $user->id
            ]);
        }
    }
}
