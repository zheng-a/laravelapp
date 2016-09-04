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

    public function details(Request $request, $id){
        $product = Cache::get('product_'.$id);
        if(!$product){
            $product = Product::find($id);
            if(!$product)
                exit('呢个优惠已经不存在了~摊手~');
            Cache::put('product_'.$id,$product,60*24);
        }
    	
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
            DB::table('Products')->where('id',$id)->update(['views'=>$views]);
            Cache::forever('post_views_cnt'.$id,0);
        }

    	return view('contents.content', ['product' => $product, 'views' => $views]);
    }
}
