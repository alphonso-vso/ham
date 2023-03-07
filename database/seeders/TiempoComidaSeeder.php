<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TiempoComidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tiempo_comidas')->insert(
            [
                'nombre' => 'Desayuno',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('tiempo_comidas')->insert(
            [
                'nombre' => 'Almuerzo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('tiempo_comidas')->insert(
            [
                'nombre' => 'Merienda',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('tiempo_comidas')->insert(
            [
                'nombre' => 'Otros',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
