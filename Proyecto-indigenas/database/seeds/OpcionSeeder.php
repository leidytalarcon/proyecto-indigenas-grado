<?php

use Illuminate\Database\Seeder;

class OpcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('opcion')->insert([
            'id_opcion' => 1,
            'valor' => '0 a 14',
            'descripcion' => 'Niños',
            'fk_id_filtro' => 1,
            'fk_id_usuario' => 1
        ]);
        DB::table('opcion')->insert([
            'id_opcion' => 2,
            'valor' => '15 a 25',
            'descripcion' => 'Jovenes',
            'fk_id_filtro' => 1,
            'fk_id_usuario' => 1
        ]);
        DB::table('opcion')->insert([
            'id_opcion' => 3,
            'valor' => '26 a 50',
            'descripcion' => 'Adultos',
            'fk_id_filtro' => 1,
            'fk_id_usuario' => 1
        ]);
        DB::table('opcion')->insert([
            'id_opcion' => 4,
            'valor' => '> 51',
            'descripcion' => 'Ancianos',
            'fk_id_filtro' => 1,
            'fk_id_usuario' => 1
        ]);
    }
}
