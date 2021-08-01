<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class apiCategoryController extends Controller
{
    public function index (){

        $categories=Category::get();
        return response()->json($categories);



    }
}
