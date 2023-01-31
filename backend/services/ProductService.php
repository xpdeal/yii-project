<?php

namespace backend\services;

use backend\repositories\ProductRepository;
use backend\services\Service;
use backend\services\StoreService;

class ProductService extends Service
{

    protected $productId = null;

    public function setProductId(int $id)
    {
        $this->productId = $id;
        return $this;
    }

    public function store(?array $data): bool
    {

        if (!$data) {
            return $this->response('error', ['msg' => 'Empty data']);
        }

        if ($this->productId) {
            return $this->update($data);
        }

        return $this->create($data);
    }

    public function create(array $data)
    {
        if (!StoreService::checkProductLimit()) {
            return $this->response('error', [
                'msg' => 'Product Limit'
            ]);
        }

        if (ProductRepository::create($data)) {
            return true;
        }

        return false;
    }

    public function update(array $data)
    {
        return ProductRepository::update($this->productId, $data);
    }
}
