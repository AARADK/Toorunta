<?php

namespace App\Enum;

enum RolesEnum: string
{
    case Administrator = 'administrator';
    case Advertiser = 'advertiser';
    case Seller = 'seller';
    case Buyer = 'buyer';

    public static function labels(): array
    {
        return [
            self::Administrator->value => 'Administrator',
            self::Advertiser->value => 'Advertiser',
            self::Seller->value => 'Seller',
            self::Buyer->value => 'Buyer',
        ];
    }

    public function label(): string
    {
        return match($this) {
            self::Administrator => 'Administrator',
            self::Advertiser => 'Advertiser',
            self::Seller => 'Seller',
            self::Buyer => 'Buyer',
        };
    }
}
