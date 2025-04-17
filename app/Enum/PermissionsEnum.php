<?php

namespace App\Enum;

enum PermissionsEnum: string
{
    // Administrator Permissions
    case ManageUsers = 'manage users';
    case ManageRoles = 'manage roles';
    case ManagePermissions = 'manage permissions';
    case ViewDashboard = 'view dashboard';

    // Advertiser Permissions
    case CreateAds = 'create ads';
    case EditAds = 'edit ads';
    case DeleteAds = 'delete ads';
    case ViewAdStats = 'view ad stats';

    // Seller Permissions
    case CreateProducts = 'create products';
    case EditProducts = 'edit products';
    case DeleteProducts = 'delete products';
    case ViewOrders = 'view orders';

    // Buyer Permissions
    case PurchaseProducts = 'purchase products';
    case ViewPurchaseHistory = 'view purchase history';
}