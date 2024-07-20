<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){
        $category = Category::find($id);
        return view('category.show', compact('category'));
    }

}
