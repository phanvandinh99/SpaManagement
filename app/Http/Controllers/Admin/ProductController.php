<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function Index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->productService->getAll();
            return DataTables::of($data)->make(true);
        }

        return view('admin/product/index');
    }

    public function store(Request $request){
        // dd($request);



    }
}
