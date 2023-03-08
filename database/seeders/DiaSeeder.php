<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dias')->insert(
            [
                'nombre' => 'Lunes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('dias')->insert(
            [
                'nombre' => 'Martes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('dias')->insert(
            [
                'nombre' => 'Miércoles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('dias')->insert(
            [
                'nombre' => 'Jueves',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('dias')->insert(
            [
                'nombre' => 'Viernes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('dias')->insert(
            [
                'nombre' => 'Sábado',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
