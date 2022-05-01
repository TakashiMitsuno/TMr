<?php
use App\Category;
class CategoryController extends Controller
{
public function index(Category $category)
{
    return view('index')->with(['categories' => $category->getByCategory()]);
}
}
?>