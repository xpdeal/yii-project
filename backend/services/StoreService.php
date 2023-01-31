<?php

namespace backend\services;

use backend\repositories\ProductRepository;
use backend\services\interfaces\StoreInterface;
use backend\services\Service;

class StoreService extends Service implements StoreInterface
{

    public static function countProducts(): int
    {
        return ProductRepository::count(1, []);
    }

    public static function checkProductLimit(): bool
    {
        return true;
        if (self::CONFIG['product_limit'] >= self::countProducts()) {
            return false;
        }

        return true;
    }
}
