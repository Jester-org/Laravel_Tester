<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Promotion;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::with('promotion')->get();
        return view('categories.index', compact('categories'));
    }

    public function addCategoryForm()
    {
        $promotions = Promotion::all();
        return view('categories.create', compact('promotions'));
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'promotion_id' => 'nullable|exists:promotions,id',
            'promotion_value' => 'nullable|numeric|min:0',
            'promotion_free_item' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'description', 'promotion_id']);
        if ($request->promotion_id) {
            $promotion = Promotion::find($request->promotion_id);
            $promotion->value = $request->promotion_value ?? $promotion->value;
            $promotion->free_item = $request->promotion_free_item ?? $promotion->free_item;
            $promotion->save();
        }

        Category::create($data);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function editCategoryForm($id)
    {
        $category = Category::findOrFail($id);
        $promotions = Promotion::all();
        return view('categories.edit', compact('category', 'promotions'));
    }

    public function editCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'promotion_id' => 'nullable|exists:promotions,id',
            'promotion_value' => 'nullable|numeric|min:0',
            'promotion_free_item' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $data = $request->only(['name', 'description', 'promotion_id']);
        if ($request->promotion_id) {
            $promotion = Promotion::find($request->promotion_id);
            $promotion->value = $request->promotion_value ?? $promotion->value;
            $promotion->free_item = $request->promotion_free_item ?? $promotion->free_item;
            $promotion->save();
        }

        $category->update($data);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function showCategory($id)
    {
        $category = Category::with('products', 'promotion')->findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}