<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_rol')->insert([
            'nombre' => 'Administrador',
            'descripcion' => 'Administrador del sistema'
        ]);
        DB::table('tipo_rol')->insert([
            'nombre' => 'Usuario',
            'descripcion' => 'Usuario del sistema'
        ]);
    }
}
