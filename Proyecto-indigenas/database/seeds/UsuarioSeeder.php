<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user')->insert([
            'id_usuario' => 1,
            'nombre' => 'Administrador',
            'telefono' => 123456789,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'fk_id_tipo_documento' => 1,
            'fk_id_rol' => 1
        ]);
    }
}
