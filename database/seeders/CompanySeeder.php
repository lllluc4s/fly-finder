<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name'    => 'LATAM Airlines Brasil',
            'local'   => 'Santiago, Chile',
            'website' => 'https://www.latam.com/pt_br/',
        ]);

        Company::create([
            'name'    => 'GOL Linhas Aereas',
            'local'   => 'São Paulo, Brasil',
            'website' => 'https://www.voegol.com.br/',
        ]);

        Company::create([
            'name'    => 'Azul Linhas Aereas',
            'local'   => 'Barueri, Brasil',
            'website' => 'https://www.voeazul.com.br/',
        ]);

        Company::create([
            'name'    => 'Voepass',
            'local'   => 'Ribeirão Preto, Brasil',
            'website' => 'https://www.voepass.com.br/',
        ]);

        Company::create([
            'name'    => 'MAP Linhas Aéreas',
            'local'   => 'Manaus, Brasil',
            'website' => 'https://www.voemap.com.br/',
        ]);
    }
}
