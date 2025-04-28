<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EnderecoResponsavel;
use App\Models\Responsavel;

class EnderecoResponsavelSeeder extends Seeder
{
    public function run()
    {
        $responsaveis = Responsavel::all();

        foreach ($responsaveis as $responsavel) {
            EnderecoResponsavel::factory()->create([
                'fk_id_responsavel' => $responsavel->id_responsavel
            ]);
        }
    }
}
