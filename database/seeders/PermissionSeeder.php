<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\PermissionEnum;
use App\RoleEnum;







class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    public function run(): void
    {
        Permission::create(['name' => PermissionEnum::MANAGE_USERS]);
        Permission::create(['name' => PermissionEnum::DELETE_CLIENTS]);
        Permission::create(['name' => PermissionEnum::DELETE_PROJECTS]);
        Permission::create(['name' => PermissionEnum::DELETE_TASKS]);   


        $role = Role::findByName(RoleEnum::ADMIN->value);
        $role->givePermissionTo([
            PermissionEnum::MANAGE_USERS,
            PermissionEnum::DELETE_CLIENTS,
            PermissionEnum::DELETE_PROJECTS,
            PermissionEnum::DELETE_TASKS,
        ]);
    }
}
