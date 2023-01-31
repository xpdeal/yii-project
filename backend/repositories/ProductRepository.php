<?php

namespace backend\repositories;

use backend\models\Product;
use Exception;

class ProductRepository
{

    public static function create(array $data): array
    {
        $product = new Product();
        $product->active = true;
        $product->name = $data['name'];
        $product->description = $data['description'];

        if ($product->validate()) {
            $product->save();
            return ['error' => false, 'product' => $product];
        }

        return ['error' => true];
    }

    public static function update($id, $data): bool
    {
        $product = Product::findOne($id);

        $product->name = $data['name'];
        $product->description = $data['description'];

        if ($product->save()) {
            return true;
        }
        return false;
    }

    public static function delete()
    {
    }

    public static function getOne()
    {
    }

    public static function getAll()
    {
    }

    public static function count(int $storeId, array $params): int
    {
        try {
            return Product::find()
                ->andWhere(['store_id' => $storeId])
                ->andWhere($params)
                ->count();
        } catch (Exception $e) {
            //log
            return 0;
        }
    }
}
