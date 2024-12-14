<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Asegúrate de que los roles están en la base de datos
         Role::create(['name' => 'admin']);
         Role::create(['name' => 'cliente']);
         Role::create(['name' => 'invitado']);
    }
}
