<?php

namespace App\Http\Controllers;

use DB;
use App\Product;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    public function index(){
        $products = DB::select('select * from products order by id desc');
    	return view('admin.products',['products' => $products]);
    }
}
