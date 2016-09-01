<?php

namespace App\Http\Controllers;

use DB;
use App\Product;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	//$products = Product::all();
        $products = DB::select('select * from products order by id desc');
    	return view('admin.manage',['products' => $products]);
    }

    public function destroy($id){
    	Product::destroy($id);
    	return redirect('/admin/manage');
    }

    public function newProduct(){
    	return view('admin.new');
    }

    public function add(){
    	$file = Request::file('file');
    	$extension = $file->getClientOriginalExtension();
        $newFileName = $file->getFilename().'.'.$extension;
        $savePath = '/img/products/'.$newFileName;
        Storage::put($savePath,File::get($file));

    	$entry = new \App\File();
        $entry->filename = $newFileName;
    	$entry->mime = $file->getClientMimeType();
    	$entry->original_filename = $file->getClientOriginalName();

    	$entry->save();

    	$product = new Product();           
        $product->title =Request::input('title');
        $product->address=Request::input('address');
        $product->discount=Request::input('discount');
        $product->startat=Request::input('startat');
        $product->endat=Request::input('endat');
        $product->channel=Request::input('channel');
        $product->description =Request::input('description');
        $product->file_id=$entry->id; 
        $product->imageurl ="/uploads".$savePath;
        $product->member_id =Auth::user()->name;//Request::input('member_id');

        $product->save();

        return redirect('/admin/manage');
    }
}

