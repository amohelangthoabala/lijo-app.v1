<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles and their corresponding permissions
        $rolesAndPermissions = [
            'Admin' => [
                // Full access to all permissions
                'user.create', 'user.view', 'user.update', 'user.delete', 'user.manage_roles',
                'role.create', 'role.view', 'role.update', 'role.delete', 'role.manage_permissions',
                'permission.view', 'permission.assign', 'order.manage', 'settings.manage_themes',
                'settings.manage_payment_gateways', 'settings.manage_delivery_zones',
                'marketing.manage_campaigns', 'log.view', 'log.export', 'log.delete',
                'report.generate', 'report.view', 'report.export', 'analytics.view', 'analytics.manage',
            ],
            'Restaurant' => [
                'restaurant.create', 'restaurant.view', 'restaurant.update', 'restaurant.delete',
                'restaurant.manage', 'restaurant.view_menu', 'restaurant.update_menu',
                'menu.create', 'menu.view', 'menu.update', 'menu.delete', 'menu.manage_categories',
                'menu.manage_items', 'menu.update_pricing', 'order.view', 'order.status.update',
            ],
            'Driver' => [
                'delivery.view', 'delivery.update', 'delivery.status.update', 'delivery.track',
                'delivery.assign_driver', 'order.view', 'order.track',
            ],
            'Customer' => [
                'order.create', 'order.view', 'order.track', 'user.view_profile', 'user.update_profile',
                'address.create', 'address.view', 'address.update', 'address.delete',
                'review.view', 'feedback.view', 'notification.view',
            ],
        ];

        // Assign roles and permissions
        foreach ($rolesAndPermissions as $roleName => $permissions) {
            // Create or fetch the role
            $role = Role::updateOrCreate(['name' => $roleName]);

            // Assign permissions to the role
            foreach ($permissions as $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
                $role->givePermissionTo($permission);
            }
        }
    }
}
