<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category\Category;

class TestController extends Controller
{


    public function testCategory()
    {
        // $category = Category::with(['parent', 'children'])->find(16);

        // if ($category->parent) {
        //     echo "P C: " . $category->parent->name . "<br>";
        // }
        // foreach ($category->children as $child) {
        //     echo  "C C : " . $child->name . "<br>";
        // }
        //  foreach ($child->grandchildren as $grandchild) {
        //     echo "G-C : " . $grandchild->name . "<br>";
        // }
        

        $category = Category::find(22); // Get a category
        echo '<pre>';
        echo $courses = $category->courses; // Get all courses related to this category

    }
}
