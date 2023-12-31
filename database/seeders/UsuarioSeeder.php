<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
        [
            'user_id' => 1,
            'roles_id' => 1,
            'email' => 'abril14@gmail.com',
            'password' => Hash::make('hernandez'),
            'nombre' => 'Abril',
            'apellido' => 'Hernandez',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => null,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 2,
            'roles_id' => 2,
            'email' => 'jorgelina@gmail.com',
            'password' => Hash::make('pestalardo'),
            'nombre' => 'Jorgelina',
            'apellido' => 'Pestalardo',
            'biografia' => 'Soy programadora y diseñadora web',
            'libroPreferido' => null,
            'img' => '20230614075332_jorgelina.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 3,
            'roles_id' => 2,
            'email' => 'juan@gmail.com',
            'password' => Hash::make('rodriguez'),
            'nombre' => 'Juan Cruz',
            'apellido' => 'Rodriguez',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615170228_soledad.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 4,
            'roles_id' => 2,
            'email' => 'german@gmail.com',
            'password' => Hash::make('german123'),
            'nombre' => 'Germán',
            'apellido' => 'Sanchez',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615171417_german.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 5,
            'roles_id' => 2,
            'email' => 'felipe@gmail.com',
            'password' => Hash::make('felipe123'),
            'nombre' => 'Felipe',
            'apellido' => 'Rosales',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615171343_felipe.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 6,
            'roles_id' => 2,
            'email' => 'soledad@gmail.com',
            'password' => Hash::make('sole123'),
            'nombre' => 'Soledad',
            'apellido' => 'Cardozo',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615170228_soledad.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 7,
            'roles_id' => 2,
            'email' => 'laura@gmail.com',
            'password' => Hash::make('grosso123'),
            'nombre' => 'Laura',
            'apellido' => 'Grosso',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615171611_laura.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 8,
            'roles_id' => 2,
            'email' => 'Julian@gmail.com',
            'password' => Hash::make('Olivera123'),
            'nombre' => 'Julian',
            'apellido' => 'Olivera',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615171306_julian.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 9,
            'roles_id' => 2,
            'email' => 'lucas123@gmail.com',
            'password' => Hash::make('quintana321'),
            'nombre' => 'Lucas',
            'apellido' => 'Quintana',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615171234_lucas.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 10,
            'roles_id' => 2,
            'email' => 'luis56@gmail.com',
            'password' => Hash::make('olealuis'),
            'nombre' => 'Luis',
            'apellido' => 'Olea',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615171142_luis.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 11,
            'roles_id' => 2,
            'email' => 'lourdes@gmail.com',
            'password' => Hash::make('medina564'),
            'nombre' => 'Lourdes',
            'apellido' => 'Medina',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615171653_lourdes.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 12,
            'roles_id' => 2,
            'email' => 'alvaro@gmail.com',
            'password' => Hash::make('alvaro123'),
            'nombre' => 'Alvaro',
            'apellido' => 'Gomez',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615171031_alvaro.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 13,
            'roles_id' => 2,
            'email' => 'pepe@gmail.com',
            'password' => Hash::make('jose123'),
            'nombre' => 'Jose',
            'apellido' => 'Gomez',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615170935_jose.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 14,
            'roles_id' => 2,
            'email' => 'ignacio@gmail.com',
            'password' => Hash::make('igna123'),
            'nombre' => 'Ignacio',
            'apellido' => 'Ramirez',
            'biografia' => null,
            'libroPreferido' => null,
            'img' => '20230615170813_ignacio.jpg',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
    }
}
