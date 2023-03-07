<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlatilloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platillos')->insert(
            [
                'nombre' => 'Gallo pinto ejecutivo',
                'precio' => 1000,
                'ingredientes' => 'Gallo pinto, huevos, queso, platano maduro',
                'id_tiempo_comida' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
