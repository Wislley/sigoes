<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'gerenciar escolas']);
        Permission::create(['name' => 'gerenciar diretores']);
        Permission::create(['name' => 'gerenciar secretarios']);
        Permission::create(['name' => 'gerenciar tipos_ocorrencia']);
        Permission::create(['name' => 'gerenciar medidas']);
        Permission::create(['name' => 'gerenciar alunos']);
        Permission::create(['name' => 'gerenciar ocorrencias']);

        $admin = Role::create(['name' => 'admin']);
        $permissions = [
            ['name' => 'gerenciar escolas'],
            ['name' => 'gerenciar diretores'],
            ['name' => 'gerenciar tipos_ocorrencia'],
            ['name' => 'gerenciar medidas']
        ];

        $admin->syncPermissions($permissions);


        $diretor = Role::create(['name' => 'diretor']);

        $permissions = [
            ['name' => 'gerenciar alunos'],
            ['name' => 'gerenciar ocorrencias'],
            ['name' => 'gerenciar secretarios'],
        ];

        $diretor->syncPermissions($permissions);

        $secretario = Role::create(['name' => 'secretario']);
        $permissions = [
            ['name' => 'gerenciar alunos'],
            ['name' => 'gerenciar ocorrencias'],
        ];

        $secretario->syncPermissions($permissions);
    }
}
