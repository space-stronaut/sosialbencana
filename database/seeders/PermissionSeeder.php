<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-edit',
            'role-index',
            'role-create',
            'role-delete'
        ];

        foreach ($permissions as $item) {
            Permission::create([
                'name' => $item
            ]);
        }
    }
}
