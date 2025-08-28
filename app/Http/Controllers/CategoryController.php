<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index(){

        $category = Category::latest()->paginate(7);
        return view('category.index', compact('category'));
    }

    public function add(Request $request){
        $request->validate([
            'category' => 'required'
        ]);


      

        if(  Category::create($request->all())){
            
        return back()->with('success', 'Category added successfully');
        }
        
        return back()->with('error', 'failed');
    }

    public function edit($id, Category $category){

        $category = Category::findOrFail($id);  

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'category' => 'required'
        ]);

        $updated = Category::findOrFail($id);

        if($updated->update($request->all())){
            return redirect()->route('category')->with('success', 'Updated successfully');
        }
        return redirect()->route('category')->with('error', 'Failed');
        
    }

    public function delete($id, Category $category){
        $category = Category::findOrFail($id);

        if($category->delete()){
            return back()->with('success', 'deleted successfully');
        }
        return back()->with('error', 'Failed');
    }

}
