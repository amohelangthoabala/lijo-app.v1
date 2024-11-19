<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // User Management
            'user.create',
            'user.view',
            'user.update',
            'user.delete',
            'user.manage_roles',
            'user.view_profile',
            'user.update_profile',

            // Role and Permission Management
            'role.create',
            'role.view',
            'role.update',
            'role.delete',
            'role.manage_permissions',
            'permission.view',
            'permission.assign',

            // Orders
            'order.create',
            'order.view',
            'order.update',
            'order.delete',
            'order.manage',
            'order.status.update',
            'order.assign_driver',
            'order.track',

            // Restaurants
            'restaurant.create',
            'restaurant.view',
            'restaurant.update',
            'restaurant.delete',
            'restaurant.manage',
            'restaurant.view_menu',
            'restaurant.update_menu',

            // Menu Management
            'menu.create',
            'menu.view',
            'menu.update',
            'menu.delete',
            'menu.manage_categories',
            'menu.manage_items',
            'menu.update_pricing',

            // Delivery Management
            'delivery.create',
            'delivery.view',
            'delivery.update',
            'delivery.delete',
            'delivery.manage',
            'delivery.track',
            'delivery.status.update',
            'delivery.assign_driver',

            // Drivers
            'driver.create',
            'driver.view',
            'driver.update',
            'driver.delete',
            'driver.manage',
            'driver.assign_order',

            // Reviews and Ratings
            'review.view',
            'review.approve',
            'review.delete',
            'review.manage',

            // Payments
            'payment.create',
            'payment.view',
            'payment.update',
            'payment.delete',
            'payment.refund',
            'payment.manage',

            // Addresses
            'address.create',
            'address.view',
            'address.update',
            'address.delete',
            'address.manage',

            // Notifications
            'notification.send',
            'notification.view',
            'notification.delete',
            'notification.manage',

            // Reports and Analytics
            'report.generate',
            'report.view',
            'report.export',
            'analytics.view',
            'analytics.manage',

            // App Settings
            'settings.view',
            'settings.update',
            'settings.manage_themes',
            'settings.manage_payment_gateways',
            'settings.manage_delivery_zones',

            // Coupons and Discounts
            'coupon.create',
            'coupon.view',
            'coupon.update',
            'coupon.delete',
            'coupon.manage',

            // Support and Feedback
            'support.create_ticket',
            'support.view_tickets',
            'support.update_ticket_status',
            'support.delete_ticket',
            'feedback.view',
            'feedback.manage',

            // Marketing
            'marketing.manage_campaigns',
            'marketing.view_analytics',
            'marketing.send_promotions',

            // System Logs
            'log.view',
            'log.export',
            'log.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
