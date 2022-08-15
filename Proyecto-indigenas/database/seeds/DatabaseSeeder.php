<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed
        $this->call([
            TipoDocumentoSeeder::class,
            RolSeeder::class,
            UsuarioSeeder::class,
            FiltroSeeder::class,
            OpcionSeeder::class
        ]);
    }
}
