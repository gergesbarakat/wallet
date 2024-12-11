<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'describtion' => 'required|min:10',
            'parent' => 'min:1|integer'
        ]);
        $category = Category::Create([
            'name' => $request->name,
            'describtion' => $request->describtion,
            'parent' => $request->parent
        ]);
        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:4',
            'describtion' => 'required|min:10',
            'parent' => 'min:1|integer'
        ]);
        $category->update([
            'name' => $request->name,
            'describtion' => $request->describtion,
            'parent' => $request->parent
        ]);
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return ['message' => 'deleted successfully'];
    }
}
