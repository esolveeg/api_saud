<?php

namespace App\Http\Controllers;

use App\Address;
use App\Cart;
use App\CartProduct;
use App\Coupon;
use App\CouponUser;
use App\Http\Requests\CartRequest;
use App\Product;
use App\ProductImage;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    
    public function get(Request $request)
    {
        $id = $request->user()->id;
        $cart = Cart::where('user_id' , $id)->cart()->first();
        if($cart == null){
            return response()->json(['products' => []]);
        }

        // dd($cart);
        // dd($cart);
        $products = DB::select(
                    "SELECT 
                       * 
                        FROM cart_view cv 
                        WHERE cv.cart_id = ?
                        AND cv.deleted_at IS NULL" , [$cart->id]);
        // dd($products);
        
        if(count($products) > 0){
            $cart->products = $products;
            $subtotal = DB::select("SELECT SUM(price * qty) subtotal FROM cart_view WHERE cart_id = ? AND deleted_at IS NULL" ,[ $cart->id])[0]->subtotal;
            // dd($subtotal);   
            $discountVal = 0;
            if($cart->discount_code != null){
                $coupon = Coupon::where('code' , $cart->discount_code)->first();
                // dd($coupon->type);
                if($coupon->type == 'fixed'){
                    $discountVal = $coupon->value;
                } else {
                    $cart->percentOff = $coupon->value;
                    $discountVal =  $coupon->value * $subtotal / 100;
                }
                $cart->discounVal = $discountVal;
            }
            foreach($cart->products as $pr){
                $pr->image = $pr->image && file_exists('images/'.$pr->image) ? asset('images/' . $pr->image) : $pr->image;
                $pr->ItemImage = $pr->ItemImage && file_exists('images/'.$pr->ItemImage) ? asset('images/' . $pr->ItemImage) : $pr->ItemImage;
                $pr->ItemImageWhole = $pr->ItemImageWhole && file_exists('images/'.$pr->ItemImageWhole) ? asset('images/' . $pr->ItemImageWhole) : $pr->ItemImageWhole;
            }
            $cart->subtotal = $subtotal;
            $cart->total = $subtotal - $discountVal +  $cart->shipping;
            return response()->json($cart);
        } else{
            $cart->products = [];
            return response()->json(['products' => []]);
        }   
    }

    public function getTotals(Request $request)
    {
        $id = $request->user()->id;
        $cart = Cart::where('user_id' , $id)->select(['id' , 'shipping' , 'discount_code'])->cart()->first();
        $subtotal = DB::select("SELECT SUM(price * qty) subtotal FROM cart_product WHERE cart_id = ? AND deleted_at IS NULL" ,[ $cart->id])[0]->subtotal;
        $discountVal = 0;
        if($cart->discount_code != null){
            $coupon = Coupon::where('code' , $cart->discount_code)->first();
            if($coupon->type == 'fixed'){
                $discountVal = $coupon->value;
            } else {
                $cart->percentOff = $coupon->value;
                $discountVal =  $coupon->value * $subtotal / 100;
            }
            $cart->discounVal = $discountVal;
        }
        $cart->subtotal = $subtotal;
        $cart->total = $subtotal - $discountVal +  $cart->shipping;
        return response()->json($cart);
    }

    public function checkout(Request $request)
    {
        $id = $request->user()->id;
        $cart = Cart::where('user_id' , $id)->cart()->first();
        if($cart == null){
            return response()->json('no items on your cart' ,400);
        }
        if($cart->address_id == null){
            return response()->json('Please select address' ,400);
        }
        $cart->closed_at = now();
        $cart->save();
    }
    public function applyCoupon(Request $request){
        $id = $request->user()->id;
        
        $coupon = Coupon::where('code' , $request->code)->first();
        if($coupon == null){
            return response()->json('this coupon dosen\'t exists' , 400);
        }
        $used = CouponUser::where('coupon_id' , $coupon->id)->where('user_id' , $id)->first() !== null;
        if($used){
            return response()->json('you used this coupon previousily' , 400);
        }
        $expiresAt = Carbon::createFromFormat('Y-m-d', $coupon->expires_at);
        $expired = $expiresAt->lt(Carbon::now()->format('Y-m-d'));
        // dd($id);
        // dd($expired);
        if($expired == true){
            return response()->json('this coupon is expired' , 400);
        }
        $cart = Cart::where('user_id' , $id)->cart()->first();
        if($cart == null){
            $cart = $this->init($id);
        }
        $cart->discount_code = $coupon->code;
        $cart->save();
        return response()->json('applied successfully');
        
    }
    public function applyAddress(Request $request , $id){
        $userId = $request->user()->id;
        $address = Address::find($id);
        if($address == null){
            return response()->json('this address dosen\'t exists' , 400);
        }
        $cart = Cart::where('user_id' , $userId)->cart()->first();
        if($cart == null){
            return response()->json('You Don\'t have cart yet' , 400);

        }
        $cart->address_id = $id;
        $cart->shipping = $address->area->DeliveryServiceTotal;
        $cart->save();
        return response()->json('applied successfully');
        
    }
    public function create(Request $request)
    {
        // dd(CartProduct::all());
        $id = $request->user()->id;
        $cart = Cart::where('user_id' , $id)->cart()->first();
        if($cart == null){
            $cart = $this->init($id);
        }
        $whole = $request->whole ?  $request->whole : false;
        
        $this->setProducts($cart->id , $request->product , $request->qty , $whole);
        return response()->json(['success' => 'true' , 'message' => 'added to cart successfully']);
    }
    private function init($id){
        $cart = Cart::create(['user_id' => $id]);
        return $cart;
    }
    private function setProducts($cart  , $product ,  $qty , $whole = false){
        // dd($product);
        $product = Product::where('id' , $product)->first();
        $cartProduct = CartProduct::where('product_id' , $product->id)->where('whole' , $whole)->where('cart_id' , $cart)->first();
        if($cartProduct != null) $whole = $cartProduct->whole;
        if(!$whole){
            $qty = $qty == null ? 1 : $qty;
            $price = $product->POSPP;
        } else {
            $price = $product->POSTP;
            $qty = $qty == null ? $product->MinorPerMajor : $product->MinorPerMajor * $qty;
        }

        $image = null;
        if($cartProduct !==  null ){
            $cartProduct->qty = $cartProduct->qty + $qty;
            $cartProduct->save();
            return $product; 
        } 
        $rec = [
            "cart_id" => $cart,
            "product_id" => $product->id,
            "image" => $image,
            "price" => $price,
            "MinorPerMajor" => $product->MinorPerMajor,
            "qty" => $qty,
            "whole" => $whole
        ];
        // dd($rec);
        CartProduct::create($rec);
        return $product;
    }
    public function delete(Request $request , $id)
    {
        $userId = $request->user()->id;
        $cart = Cart::where('user_id' , $userId)->cart()->first();
        // dd($id);
        if($cart == null){
            return response()->json(['success' => 'false' , 'message' => 'no items on your cart']);
        }
        $pr = CartProduct::where('cart_id' , $cart->id)->where('product_id' , $id)->first();
        $pr->deleted_at = now();
        $pr->save();
        // dd($pr);
        return response()->json(['success' => 'true' , 'message' => 'deleted from cart successfully']);

    }
    public function update($id , Request $request)
    {
        $userId = $request->user()->id;
        $cart = Cart::where('user_id' , $userId)->cart()->first();
        $cp = CartProduct::where('cart_id' , $cart->id)->where('product_id' , $id)->first();
        if($cp->whole){
            $request->qty =  $request->qty * $cp->MinorPerMajor;
        }
        if($cp == null){
            return response()->json(['message' => 'your cart dosen\'t contain this product'] , 400);
        }
        DB::update('UPDATE cart_product SET qty = ? WHERE cart_id = ? AND product_id = ?', 
            [
                $request->qty,
                $cart->id,
                $id,
            ]);
        return response()->json(['success' => 'true' , 'message' => 'quantity updated successfully']);
    }
}
