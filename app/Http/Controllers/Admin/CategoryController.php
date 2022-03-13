<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required'
            ], [
                'name.required' => 'El campo nombre de categoría no puede ser vacío.'
        ]);

        Category::create($request->all());
        return back();
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required'
            ], [
                'name.required' => 'El campo nombre de categoría no puede ser vacío.'
        ]);

        $category_id = $request->input('category_id');
        $category = Category::find($category_id);
        $category->name = $request->input('name');
        $category->save();
        return back();
    }

    public function delete($id){
        Category::find($id)->delete();
        return back();
    }

    
}
