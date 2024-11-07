<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            $search = $request->query('search');
            $sortBy  = $request->query('sort_by', 'name');
            $sortOrder = $request->query('sort_order', 'asc');


        $query = Product::query();

        if ($search) {
            $query->where('product_id', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        // Get sorted and filtered products
        $query->orderBy($sortBy, $sortOrder);
        $products = $query->paginate(5);

        // Fetch products with sorting

        return view('index', compact('products', 'search', 'sortBy', 'sortOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'product_id' => 'required|string|unique:products,product_id|max:255'
        ],[
            'name.required'=> 'Product name is required',
            'product_id.required' => 'The product ID is required.',
            'product_id.unique' => 'This product ID has already been taken.',
        ]);

        $product_id = str::replace(' ', '', $request['product_id']);
        $imagePath = null;
        if($request->has('image')){
            $file = $request->file('image');
            $imageName = $request->product_id . '-'.uniqid(). '.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('assets/images/product/', $imageName, 'public');

        }
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_id' => $product_id,
            'image' => $imagePath,

        ]);
        return redirect()->route('products');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $product = Product::findorfail($id);
        return view('show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $product = Product::findorfail($id);
        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $id = $request->id;
        
        $product = Product::findorfail($id);
        $imagePath = $product->image;
        if($request->has('image')){
            $file = $request->file('image');
            $imageName = $request->product_id . '-'.uniqid(). '.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('assets/images/product/', $imageName, 'public');
            if($product->image){
                storage::disk('public')->delete($product->image);
            }
        }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_id' => $request->product_id,
            'image' => $imagePath,
        ]);
        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        if($product->image){
            storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products');
    }
}