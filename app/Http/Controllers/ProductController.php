<?php

namespace App\Http\Controllers;

use DB;
use Cache;
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
        $products = DB::table('products')->orderby('id','desc')->paginate(15);
    	return view('admin.manage',['products' => $products]);
    }

    public function destroy($id){
        Product::destroy($id);
        Cache::flush();
    	return redirect('/admin/manage');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.edit',['product' => $product]);
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
        $product->description =Request::input('content');
        $product->file_id=$entry->id; 
        $product->imageurl ="/uploads".$savePath;
        $product->member_id =Auth::user()->name;//Request::input('member_id');
        $product->views=0;

        $product->save();

        Cache::flush();

        return redirect('/admin/manage');
    }

    public function update($id){
        $product = Product::find($id);
        // $file = Request::file('file');
        // $extension = $file->getClientOriginalExtension();
        // $newFileName = $file->getFilename().'.'.$extension;
        // $savePath = '/img/products/'.$newFileName;
        // Storage::put($savePath,File::get($file));

        // $entry = new \App\File();
        // $entry->filename = $newFileName;
        // $entry->mime = $file->getClientMimeType();
        // $entry->original_filename = $file->getClientOriginalName();

        // $entry->save();
       
        $product->title =Request::input('title');
        $product->address=Request::input('address');
        $product->discount=Request::input('discount');
        $product->startat=Request::input('startat');
        $product->endat=Request::input('endat');
        $product->channel=Request::input('channel');
        $product->description =Request::input('content');
        //$product->file_id=$entry->id; 
        //$product->imageurl ="/uploads".$savePath;
        $product->member_id =Auth::user()->name;//Request::input('member_id');
        $product->views=0;

        $product->update();

        Cache::flush();

        return redirect('/admin/manage');
    }
}

