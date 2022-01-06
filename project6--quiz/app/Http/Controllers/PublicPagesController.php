<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PublicPagesController extends Controller
{
    public function index(){

        $categories=Category::all();
        return view('home',compact('categories'));
    }
    public function post($category_id){
        $cat_name = Category::where('category_id',$category_id)->first();
        $cat_name = $cat_name->category_name;

        $categories=Exam::all()->where('category_id',$category_id);

        return view('home',compact('categories','cat_name'));
    }
    

}
