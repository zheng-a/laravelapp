<?php

namespace App\Http\Controllers;

use DB;
use Cache;
use App\Product;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    public function index(Request $request){
        $request->session()->put('page', 1);
        $products = Cache::get('products');
        if(!$products){
            $products = DB::table('products')->orderby('id','desc')->skip(0)->take(3)->get();
            Cache::put('products',$products,60);
        }

    	return view('admin.products',['products' => $products]);
    }

    public function more(Request $request){
        $skip = 3;
        $page = $request->session()->get('page');
        $products = DB::table('products')->orderby('id','desc')->skip($skip*$page)->take($skip)->get();
        $msg = '';
        foreach ($products as $product) {
            $temp = <<<MSG
         <li class="wow fadeIn market">
            <a href="/details/$product->id" class="list_img"><img class="lazy" data-original=$product->imageurl src=$product->imageurl></a>
            <div class="list_content">
                <div class="sale_type">
                    <i class="arrowmask"></i>
                    <span>$product->discount</span>
                    <div class="sale_tips">
                        <b><i class="iconfont">&#xe60b;</i>$product->address</b>
                        <b><i class="iconfont">&#xe60f;</i>$product->startat 至 $product->endat</b>
                    </div>
                </div>
                <h1 class="sale_title">
                    <a href="/details/$product->id" class="ellipsis">$product->title</a>
                    <div class="sale_head"><img src="/images/head01.jpg">$product->member_id</div>
                </h1>
            </div>
        </li>
MSG;
            $msg .= $temp;
        }
        $request->session()->put('page',$page+1);
        return response()->json(array('msg'=> $msg), 200);
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
