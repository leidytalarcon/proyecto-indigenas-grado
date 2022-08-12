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
        DB::table('rol')->insert([
            'id_rol' => 1,
            'nombre' => 'Administrador',
            'descripcion' => 'Administrador del sistema'
        ]);
        DB::table('rol')->insert([
            'id_rol' => 2,
            'nombre' => 'Usuario',
            'descripcion' => 'Usuario del sistema'
        ]);
    }
}
