<?php

namespace Database\Seeders;

use App\Models\Adicional;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and Permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create SA Role
        $roleSA = Role::create(['name' => 'super-admin']);

        // Create SA User
        $userSA = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'sa@email.com',
            'password' => Hash::make('123456789'),
        ]);

        // Assign role
        $userSA->assignRole($roleSA);

        $this->call([
            TiempoComidaSeeder::class,            
            AdicionalSeeder::class,
            PlatilloSeeder::class,
        ]);
    }
}
