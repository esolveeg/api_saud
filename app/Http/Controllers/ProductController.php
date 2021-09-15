<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartProduct;
use App\Group;
use App\Http\Requests\ListProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create(Request $request)
    {

    }
    public function update(Request $request)
    {

    }
    public function delete(Request $request)
    {

    }
    public function find($id , Request $request)
    {
        $product = Product::find($id);
        if($product == null){
            return response()->json('product not found' , 400);
        }
        $group  = Group::select([ 'id' ,'GroupNameEn' , 'GroupName' ])->find($product->GroupCode);
        $product->group = $group;
        // if(isset($user->id)){
            //     $product = $this->inCartProduct($user , $product);
            // }
        
        $product->ItemImage = $product->ItemImage && file_exists('images/'.$product->ItemImage) ? asset('images/' . $product->ItemImage) : $product->ItemImage;
        
        
        return response()->json($product);
    }


   
 
    private function inCartProduct($user , $product){
       
            $cart = Cart::cart()->select(['id'])->where('user_id' , $user->id)->first();
            if($cart !== null){
                $inCart = CartProduct::where('cart_id' , $cart->id)->where('product_id' , $product->id)->first();
                if($inCart !== null){
                    $product->InCart = true;
                    $product->cartQty = $inCart->qty;
                }
            }
            $wihslist =  DB::select(
                "SELECT 
                    w.id
                    FROM wishlist w 
                    JOIN products p 
                        ON w.product_id = p.id
                    WHERE w.user_id = ? AND isNull(w.deleted_at) AND p.id = ? " , [$user->id , $product->id]);
            if(isset($wihslist[0])){
                $product->InWihslit = true;
            }

            return $product;
        
    }
    public function list(ListProductRequest $request)
    {
        $priceFrom = $request->priceFrom ? $request->priceFrom : null;
        $priceTo = $request->priceTo ? $request->PriceTo : null;
        $search = $request->search ? $request->search : null;
        // dd($PriceFrom);
        $page = $request->page ?  $request->page : 1;
        $groupCode = $request->group ? $request->group : null;
        $products =DB::select("CALL GetProducts(? , ? , ? , ? , ? , ? , @CountRecords ) " , [$search , asset('images/') , $priceFrom , $priceTo ,$groupCode,$page  ]);
        $count = DB::select('select @CountRecords as count')[0]->count;
        $last = ceil($count / 8);
        $result = ['data' => $products , 'total' => $count , 'last_page' => $last];
        return $result;
    }
    public function listHome($key , Request $request)
    {
        if($key == 'featured'){
            $products = DB::select("SELECT * FROM products_view WHERE featured = 1");
        } else if($key == 'latest'){
            $products = DB::select("SELECT * FROM products_view WHERE latest = 1");
        } else if($key == 'bestseller'){
            $products = DB::select("SELECT * FROM products_view WHERE bestseller = 1");
            // dd($products);
        } else {
            return [];
        }
        foreach($products as $product)
        {
            $product->ItemImage = $product->ItemImage && file_exists('images/'.$product->ItemImage) ? asset('images/' . $product->ItemImage) : $product->ItemImage;

        }

        return $products; 
    }

    protected function inCart($user , $products , $request)
    {
        $cart = Cart::cart()->select(['id'])->where('user_id' , $user)->first();
            foreach($products as $product){
              

                if($cart !== null){
                    $inCart= CartProduct::where('cart_id' , $cart->id)->where('product_id' , $product->id)->first();
                    if($inCart !== null){
                        $product->InCart = true;
                        $product->cartQty = $inCart->qty;
                    }
                }
                $wihslist =  DB::select(
                    "SELECT 
                        w.id
                        FROM wishlist w 
                        JOIN products p 
                            ON w.product_id = p.id
                        WHERE w.user_id = ? AND isNull(w.deleted_at) AND p.id = ? " , [$user , $product->id]);
                if(isset($wihslist[0])){
                    $product->InWihslit = true;
                }
                // dd($product);
        }
        
        return $products;
    }
}
