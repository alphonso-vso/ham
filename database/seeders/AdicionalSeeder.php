<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdicionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adicionals')->insert(
            [
                'nombre' => 'Desayuno',
                'precio' => 300,
                'id_tiempo_comida' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('adicionals')->insert(
            [
                'nombre' => 'Almuerzo',
                'precio' => 500,
                'id_tiempo_comida' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
