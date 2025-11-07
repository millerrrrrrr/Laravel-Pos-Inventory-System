<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productlist(){
        $products = Product::orderBy('stock', 'asc')->paginate(8);
        return view('product.index', compact('products'));
    }

    public function add(){

        $category = Category::orderBy('category', 'asc')->get();

        return view('product.add', compact('category'));
    }


    public function store(Request $request){
        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('photos/products', 'public');
        }
        // image
        $request->validate([
            'image' => 'nullable',
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'purchasePrice' => 'required',
            'salePrice' => 'required',
        ]);

        if(Product::create([
            'image' => $imagePath,
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'stock' => $request->stock,
            'purchasePrice' => $request->purchasePrice,
            'salePrice' => $request->salePrice,
        ])){
            return back()->with('success', 'Product added successfully');
        }
        return back()->with('error', 'Failed');
    }

    public function productDelete($id, Product $product){

        $product = Product::findOrFail($id)->delete();

        if($product){
            return back()->with('success', 'Product deleted');
        }
        return back()->with('Failed');

    }

    public function productDeleted(){

        $deleted = Product::onlyTrashed()->orderBy('name', 'asc')->paginate(8);

        return view('product.deleted', compact('deleted'));

    }

    public function productRestore($id){

        $restore = Product::onlyTrashed()->findOrFail($id)->restore();

        if($restore){
            return back()->with('success', 'Product restored successfully');
        }
        return back()->with('error', 'Failed');

    }

    public function productForceDelete($id){

        $permanent = Product::onlyTrashed()->findOrFail($id)->forceDelete();

        if ($permanent){
            return back()->with('success', 'Product deleted permanently');
        }
        return back()->with('error', 'Failed');

    }

    public function restockIndex($id){

        $products = Product::findOrFail($id);

        return view('product.restock', compact('products'));
    }

    public function productRestock($id, Request $request){

        $request->validate([
            'stock' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $product->stock = $product->stock + $request->stock;
        $product->save();

        return redirect()->route('product')->with('success', 'Stock updated successfully');

    }

}
