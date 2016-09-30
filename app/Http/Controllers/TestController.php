<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cache;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TestController extends Controller
{
	public function index(){
		$products = Cache::get('products');
		$id = 4;
		foreach ($products as $key => $product) {
			if($products[$key]->id <= $id){	
				$product = $products[$key];
				break;
			}
		}
		echo $product->id;
	}
    
}
