<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role = \App\Models\Role::create([
            'name' => 'admin'
        ]);

        \App\Models\Role::create([
            'name' => 'customer'
        ]);

        $user = \App\Models\User::factory()->create([
            'email' => 'otto@gmail.com',
            'name' => 'Otto von Bismarck'
        ])->assignRole($role);
    }
}
