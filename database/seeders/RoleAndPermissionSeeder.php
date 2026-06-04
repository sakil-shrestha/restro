<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      //Roles
      $admin=Role::create(['name'=>'Admin','guard_name'=>'web']);
      $waiter=Role::create(['name'=>'waiter','guard_name'=>'web']);
      $cashier=Role::create(['name'=>'cashier','guard_name'=>'web']);
      $manager=Role::create(['name'=>'manager','guard_name'=>'web']);
      $kitchen=Role::create(['name'=>'kitchen','guard_name'=>'web']);

      //Permissions
       $permissions = [
            // User Management
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Roles & Permissions
            'view roles',
            'assign roles',

            // Categories
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',

            // Menu Items
            'view menu',
            'create menu',
            'edit menu',
            'delete menu',

            // Tables
            'view tables',
            'create tables',
            'edit tables',
            'delete tables',

            // Orders
            'view orders',
            'create orders',
            'edit orders',
            'cancel orders',

            // Kitchen
            'view kitchen',
            'update kitchen status',

            // Payments
            'view payments',
            'process payments',

            // Inventory
            'view inventory',
            'create inventory',
            'edit inventory',
            'delete inventory',

            // Reports
            'view reports',

            // Settings
            'manage settings',
        ];

        foreach($permissions as $permission)
            {
                Permission::Create(['name'=>$permission,'guard_name'=>'web']);
            }

            //Assigning Permissions to Roles
            $admin->syncPermissions(Permission::all());

            //Manager
            $manager->syncPermissions(['view users',
            'view categories',
            'create categories',
            'edit categories',

            'view menu',
            'create menu',
            'edit menu',

            'view tables',
            'edit tables',

            'view orders',
            'edit orders',

            'view inventory',
            'edit inventory',

            'view reports',
            ]);

            // Waiter
        $waiter->syncPermissions([
            'view tables',
            'view menu',

            'view orders',
            'create orders',
            'edit orders',
        ]);

        // Kitchen
        $kitchen->syncPermissions([
            'view kitchen',
            'view orders',
            'update kitchen status',
        ]);

        // Cashier
        $cashier->syncPermissions([
            'view orders',
            'view payments',
            'process payments',
        ]);

    }
}
