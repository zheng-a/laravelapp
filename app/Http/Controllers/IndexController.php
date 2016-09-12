<?php

namespace App\Http\Controllers;

use DB;
use Cache;
use App\Product;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    public function index(){
        $products = Cache::get('products');
        if(!$products){
            $products = DB::table('products')->orderby('id','desc')->get();
            Cache::put('products',$products,60);
        }

    	return view('admin.products',['products' => $products]);
    }

    public function channel1(){
        $products = Cache::get('products_1');
        if(!$products){
            $products = DB::table('products')->where('channel','=','吃喝玩乐')->orderby('id','desc')->get();
            Cache::put('products_1',$products,60);
        }
        
    	return view('admin.products',['products' => $products]);
    }

    public function channel2(){
        $products = Cache::get('products_2');
        if(!$products){
            $products = DB::table('products')->where('channel','=','超市特价')->orderby('id','desc')->get();
            Cache::put('products_2',$products,60);
        }
        
    	return view('admin.products',['products' => $products]);
    }

    public function channel3(){
        $products = Cache::get('products_3');
        if(!$products){
            $products = DB::table('products')->where('channel','=','抵买品牌')->orderby('id','desc')->get();
            Cache::put('products_3',$products,60);
        }
        
    	return view('admin.products',['products' => $products]);
    }

    public function details(Request $request, $id){
        $products = Cache::get('products');
        foreach ($products as $key => $product) {
            if($products[$key]->id == $id){
                $product = $products[$key];
                break;
            }
        }
        if($product->id!=$id){
            $product = Product::find($id);
            if(!$product)
                exit('呢个优惠已经不存在了~摊手~');
        }
        // $product = Cache::get('product_'.$id);
        // if(!$product){
        //     $product = Product::find($id);
        //     if(!$product)
        //         exit('呢个优惠已经不存在了~摊手~');
        //     Cache::put('product_'.$id,$product,60*24);
        // }
    	
        $views = Cache::get('post_views_'.$id);
        if(!$views){
            Cache::forever('post_views_'.$id,$product->views);
        }

        $views_cnt = Cache::get('post_views_cnt_'.$id);
        if(!$views_cnt){
            Cache::forever('post_views_cnt_'.$id,0);
        }

        if(!Cache::get('post_'.$id.'_'.$request->ip())){
            Cache::put('post_'.$id.'_'.$request->ip(),1,1);
            $views += 1;
            Cache::forever('post_views_'.$id,$views);
            $views_cnt += 1;
            Cache::forever('post_views_cnt_'.$id,$views);
        }

        if($views_cnt >= 3){
            DB::table('products')->where('id',$id)->update(['views'=>$views]);
            Cache::forever('post_views_cnt'.$id,0);
        }

    	return view('contents.content', ['product' => $product, 'views' => $views]);
    }
}
