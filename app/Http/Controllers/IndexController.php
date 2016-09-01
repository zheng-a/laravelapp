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

    public function channel1(){
        $products = DB::select('select * from products where channel = ? order by id desc',['吃喝玩乐']);
    	return view('admin.products',['products' => $products]);
    }

    public function channel2(){
        $products = DB::select('select * from products where channel = ? order by id desc',['超市特价']);
    	return view('admin.products',['products' => $products]);
    }

    public function channel3(){
        $products = DB::select('select * from products where channel = ? order by id desc',['抵买品牌']);
    	return view('admin.products',['products' => $products]);
    }

    public function details($id){
    	$product = Product::find($id);
    	return view('contents.content', ['product' => $product]);
    }
}
