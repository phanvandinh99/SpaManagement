<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $productModel)
    {
        parent::__construct($productModel);
    }
}
