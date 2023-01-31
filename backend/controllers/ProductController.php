<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function init()
    {
        parent::init();
        $this->productService = new ProductService();
    }

    public function actionIndex()
    {
    }

    public function actionCreate()
    {
        $data = [
            'name' => 'Macarrão Ao Molho',
            'description' => 'X-Tudo com muito queijo'
        ];

        $product = $this
            ->productService
            //->setProductId(4)
            ->store($data);

        if ($product) {
            echo 'Salvo ou atualizado com sucesso!';
        } else {
            echo 'Falha ao salvar';
        }
    }
}
