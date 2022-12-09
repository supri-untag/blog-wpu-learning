<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function postCat(Category $category)
    {
        return view('contens.categories',[
            'cat'=> $category->name,
            'post' => $category->post->load('user', 'category')
        ]);
    }
}
