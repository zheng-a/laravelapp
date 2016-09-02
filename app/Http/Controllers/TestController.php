<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cache;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TestController extends Controller
{
	public function index(){
		//dd(Cache::get('product_1'));
		Cache::flush();
	}
    
}
