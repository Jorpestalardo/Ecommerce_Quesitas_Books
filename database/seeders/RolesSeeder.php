<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'roles_id' => 1,
                'nombre' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roles_id' => 2,
                'nombre' => 'Usuario común',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
