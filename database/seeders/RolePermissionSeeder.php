<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat daftar permissions
        $permissions = [
            'view dashboard',
            'manage kuisioner',
            'manage responden',
            'manage kriteria',
            'view analisis',
        ];

        // Tambahkan permissions ke database
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Buat role Admin dan berikan semua permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($permissions);

        // Buat role User tanpa permissions khusus
        Role::create(['name' => 'user']);
    }
}