<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService extends BaseService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        parent::__construct($this->productRepository);
    }
}
