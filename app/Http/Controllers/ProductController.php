<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Promotion;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::with('category', 'promotion')->get();
        return view('products.index', compact('products'));
    }

    public function addProductForm()
    {
        $categories = Category::all();
        $promotions = Promotion::all();
        return view('products.create', compact('categories', 'promotions'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'code' => 'nullable|string|unique:products,code',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'promotion_id' => 'nullable|exists:promotions,id',
            'promotion_value' => 'nullable|numeric|min:0',
            'promotion_free_item' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'quantity', 'price', 'code', 'category_id', 'description', 'promotion_id']);
        if (empty($data['code'])) {
            $lastProduct = Product::orderBy('id', 'desc')->first();
            $newNumber = ($lastProduct && preg_match('/(\d+)$/', $lastProduct->code, $matches))
                ? (int)$matches[1] + 2
                : 2;
            $data['code'] = 'PRD-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = preg_replace('/[^A-Za-z0-9\-\_]/', '_', $filename);
            $finalName = $filename . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/images'), $finalName);
            $data['image'] = $finalName;
        }

        if ($request->promotion_id) {
            $promotion = Promotion::find($request->promotion_id);
            $promotion->value = $request->promotion_value ?? $promotion->value;
            $promotion->free_item = $request->promotion_free_item ?? $promotion->free_item;
            $promotion->save();
        }

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function editProductForm($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $promotions = Promotion::all();
        return view('products.edit', compact('product', 'categories', 'promotions'));
    }

    public function editProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'code' => 'nullable|string|unique:products,code,' . $id,
            'image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'promotion_id' => 'nullable|exists:promotions,id',
            'promotion_value' => 'nullable|numeric|min:0',
            'promotion_free_item' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->only(['name', 'quantity', 'price', 'code', 'category_id', 'description', 'promotion_id']);
        if (empty($data['code'])) {
            $lastProduct = Product::orderBy('id', 'desc')->first();
            $newNumber = ($lastProduct && preg_match('/(\d+)$/', $lastProduct->code, $matches))
                ? (int)$matches[1] + 2
                : 2;
            $data['code'] = 'PRD-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = preg_replace('/[^A-Za-z0-9\-\_]/', '_', $filename);
            $finalName = $filename . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/images'), $finalName);
            $data['image'] = $finalName;
        }

        if ($request->promotion_id) {
            $promotion = Promotion::find($request->promotion_id);
            $promotion->value = $request->promotion_value ?? $promotion->value;
            $promotion->free_item = $request->promotion_free_item ?? $promotion->free_item;
            $promotion->save();
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function showProduct($id)
    {
        $product = Product::with('category', 'promotion')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}