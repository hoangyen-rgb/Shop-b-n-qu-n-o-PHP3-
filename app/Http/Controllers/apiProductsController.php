<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\apiProductsModel;

class apiProductController extends Controller
{

    public function index()
    {
        return apiProductsModel::all();
    }

    public function products_lasted()
    {
        return apiProductsModel::orderBy('id', 'desc')->limit(10)->get();
    }

    public function products_bestseller()
    {
        return apiProductsModel::orderBy('sold', 'desc')->limit(10)->get();
    }

    public function show($id)
    {
        return apiProductsModel::find($id);
    }

    public function store(Request $request)
    {
        $product = apiProductsModel::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = apiProductsModel::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function delete($id)
    {
        $product = apiProductsModel::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
