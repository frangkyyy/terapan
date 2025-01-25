<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    public function run()
    {
        // Insert some sample data into the 'periode' table
        DB::table('periode')->insert([
            [
                'id_periode' => '10_Ganjil_2022_2023',
                'tahun_akademik' => '2022/2023',
                'semester' => '1'
            ],
            [
                'id_periode' => '10_Genap_2022_2023',
                'tahun_akademik' => '2022/2023',
                'semester' => '2'
            ],
            [
                'id_periode' => '11_Ganjil_2023_2024',
                'tahun_akademik' => '2023/2024',
                'semester' => '3'
            ],
            [
                'id_periode' => '11_Genap_2023_2024',
                'tahun_akademik' => '2023/2024',
                'semester' => '4'
            ],
            [
                'id_periode' => '12_Ganjil_2024_2025',
                'tahun_akademik' => '2024/2025',
                'semester' => '5'
            ],
        ]);
    }
}
