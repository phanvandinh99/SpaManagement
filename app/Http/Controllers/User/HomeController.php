<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\ServiceService;

class HomeController extends Controller
{
    private ProductService $productService;
    private ServiceService $serviceService;

    public function __construct(
        ProductService $productService,
        ServiceService $serviceService
        ){
        $this->productService = $productService;
        $this->serviceService = $serviceService;
    }

    public function Index() {
        $products = $this->productService->getAll();

        $services = $this->serviceService->getAll();

        return view('user/home/index', compact('products', 'services'));
    }
}
