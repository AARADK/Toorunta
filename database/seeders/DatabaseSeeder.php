<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use App\Enum\RolesEnum;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        $adminRole = Role::create(['name' => RolesEnum::Administrator->value]);
        $advertiserRole = Role::create(['name' => RolesEnum::Advertiser->value]);
        $sellerRole = Role::create(['name' => RolesEnum::Seller->value]);
        $buyerRole = Role::create(['name' => RolesEnum::Buyer->value]);

        // Create Permissions
        // Admin Permissions
        $manageUsers = Permission::create(['name' => PermissionsEnum::ManageUsers->value]);
        $manageRoles = Permission::create(['name' => PermissionsEnum::ManageRoles->value]);
        $managePermissions = Permission::create(['name' => PermissionsEnum::ManagePermissions->value]);
        $viewDashboard = Permission::create(['name' => PermissionsEnum::ViewDashboard->value]);

        // Advertiser Permissions
        $createAds = Permission::create(['name' => PermissionsEnum::CreateAds->value]);
        $editAds = Permission::create(['name' => PermissionsEnum::EditAds->value]);
        $deleteAds = Permission::create(['name' => PermissionsEnum::DeleteAds->value]);
        $viewAdStats = Permission::create(['name' => PermissionsEnum::ViewAdStats->value]);

        // Seller Permissions
        $createProducts = Permission::create(['name' => PermissionsEnum::CreateProducts->value]);
        $editProducts = Permission::create(['name' => PermissionsEnum::EditProducts->value]);
        $deleteProducts = Permission::create(['name' => PermissionsEnum::DeleteProducts->value]);
        $viewOrders = Permission::create(['name' => PermissionsEnum::ViewOrders->value]);

        // Buyer Permissions
        $purchaseProducts = Permission::create(['name' => PermissionsEnum::PurchaseProducts->value]);
        $viewPurchaseHistory = Permission::create(['name' => PermissionsEnum::ViewPurchaseHistory->value]);

        // Assign permissions to roles
        $adminRole->syncPermissions([
            $manageUsers,
            $manageRoles,
            $managePermissions,
            $viewDashboard,
        ]);

        $advertiserRole->syncPermissions([
            $createAds,
            $editAds,
            $deleteAds,
            $viewAdStats,
        ]);

        $sellerRole->syncPermissions([
            $createProducts,
            $editProducts,
            $deleteProducts,
            $viewOrders,
        ]);

        $buyerRole->syncPermissions([
            $purchaseProducts,
            $viewPurchaseHistory,
        ]);

        // Create demo users
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ])->assignRole(RolesEnum::Administrator);

        User::factory()->create([
            'name' => 'Advertiser User',
            'email' => 'advertiser@example.com',
        ])->assignRole(RolesEnum::Advertiser);

        User::factory()->create([
            'name' => 'Seller User',
            'email' => 'seller@example.com',
        ])->assignRole(RolesEnum::Seller);

        User::factory()->create([
            'name' => 'Buyer User',
            'email' => 'buyer@example.com',
        ])->assignRole(RolesEnum::Buyer);

        // // Optional: Add dummy features if needed
        // Feature::factory(100)->create();
    }
}
