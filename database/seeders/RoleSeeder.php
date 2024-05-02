<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = [
            ['name'=>'Admin','guard_name'=>'web', 'created_at'=> Carbon::now()],
            ['name'=>'Manager','guard_name'=>'web', 'created_at'=> Carbon::now()],
            ['name'=>'Customer','guard_name'=>'web', 'created_at'=> Carbon::now()],
        ];

        foreach ($role as $value) {
        	Role::create($value);
        }
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);

        $adminRole=Role::where('name','Admin')->first();
        $managerRole=Role::where('name','Manager')->first();

        $adminRole->givePermissionTo([
            'create categories',
            'edit categories',
        ]);
        $managerRole->givePermissionTo([
            'edit categories',
        ]);

        $user = User::find(1);
        $user->assignRole('admin');

        $anotherUser = User::find(3);
        $anotherUser->assignRole('manager');
    }
}
