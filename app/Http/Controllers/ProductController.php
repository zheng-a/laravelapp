<?php

namespace App\Http\Controllers;

use DB;
use App\Product;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
    	//$products = Product::all();
        $products = DB::select('select * from products order by id desc');
    	return view('admin.products',['products' => $products]);
    }

    public function destory($id){
    	Product::destory($id);
    	return redirect('/admin/products');
    }

    public function newProduct(){
    	return view('admin.new');
    }

    public function add(){
    	$file = Request::file('file');
        $destinationPath = 'uploads/';

    	$extension = $file->getClientOriginalExtension();
    	Storage::disk('local')->put($file->getFilename().'.'.$extension, File::get($file));

    	$entry = new \App\File();
        $entry->filename = $file->getFilename().'.'.$extension;
    	$entry->mime = $file->getClientMimeType();
    	$entry->original_filename = $file->getClientOriginalName();

    	$entry->save();
        $file->move($destinationPath, $entry->filename);

    	$product = new Product();           
        $product->title =Request::input('title');
        $product->address=Request::input('address');
        $product->discount=Request::input('discount');
        $product->startat=Request::input('startat');
        $product->endat=Request::input('endat');
        $product->channel='1';//Request::input('channel');
        $product->description =Request::input('description');
        $product->file_id=$entry->id; 
        $product->imageurl ='/uploads/'.$entry->filename;//Request::input('imageurl');
        $product->member_id =Request::input('member_id');

        $product->save();

        return redirect('/admin/products');
    }
}

