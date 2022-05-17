<?php

namespace App\Domains\Products\controllers;

use App\Domains\Products\Model\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function index(Request $req)
    {
        $res = $this->model
            ->select('products.*')
            ->when($req->filter, function ($query) use ($req) {
                $query->orderBy($req->filter, 'asc');
            })
            ->when($req->search, function ($query) use ($req) {
                $str = "%{$req->search}%";
                $query
                    ->where('author_name', 'LIKE', "%{$str}%")
                    ->orWhere('product_name', 'LIKE', "%{$str}%");
            })
            ->get();

        return response()->json($res);
    }
}
