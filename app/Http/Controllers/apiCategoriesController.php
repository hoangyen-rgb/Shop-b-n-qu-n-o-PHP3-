<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\apiCategoriesModel;
class apiCategoriesController extends Controller
{
    public function index()
    {
        return apiCategoriesModel::all();
    }
    public function show($id)
    {
        return apiCategoriesModel::find($id);
    }

    public function store(Request $request)
    {
        $product = apiCategoriesModel::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = apiCategoriesModel::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function delete($id)
    {
        $product = apiCategoriesModel::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
