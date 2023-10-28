<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends CategoriesController
{
    public function index()
    {
        $request = \request();
        return Category::query()->where('community_id', $request->community_id)->latest()->get();
    }

    public function store(Request $request)
    {

        $data = $this->getData($request);
        return Category::create($data);
    }

    public function update($id, Request $request)
    {
        $data = $this->getData($request);

        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $temp = $category;
        $category->delete();

        return $temp;


    }
}
