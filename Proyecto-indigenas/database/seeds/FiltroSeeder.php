<?php

use Illuminate\Database\Seeder;

class FiltroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('filtro')->insert([
            'id_filtro' => 1,
            'nombre' => 'Rango de edad',
            'contenido' => 'Filtro basado en el rango de edad',
            'fk_id_usuario' => 1
        ]);
    }
}