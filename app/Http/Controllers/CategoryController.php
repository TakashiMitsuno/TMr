<?php
namespace App\Http\Controllers;

use App\Category;
class CategoryController extends Controller
{
public function index(Category $category)
{
    return view('indexByCategory')->with(['posts' => $category->getByCategory()]);
}
}
?>