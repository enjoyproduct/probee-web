<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Category;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
    }
    public function index()
    {
        $categories = Category::get();
        return View('admin.pages.categories', compact('categories'));
    }

    public function get_category($category_id)
    {
        
        $category = Category::findOrFail($category_id);
        return View('admin.pages.category-edit', compact('category'));
    }

    public function update_category($category_id) 
    {
        return redirect('admin/categories');
    }

}
