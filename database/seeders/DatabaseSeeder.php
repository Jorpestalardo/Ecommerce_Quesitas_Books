<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// esta clase define todos los seeders que queremos correr y en qué orden, para sembrar la base de datos con el comando: 
// php artisan db:seed
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this-> call(RolesSeeder::class);
        $this-> call(UsuarioSeeder::class);
        $this-> call(GenreSeeder::class);
        $this-> call(BooksSeeder::class);
        $this-> call(NewsSeeder::class);
    }
}
