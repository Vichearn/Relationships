<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cart;
use App\Models\Product;
use DB;
use Session;
use Image;
use File;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        //echo "<pre>"; print_r($products); die;
        return view('cart.index', compact('carts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if (Request::get('increment') == 1) {
            $product_id = Request::get('id');
            $product = Product::find($product_id);
            $qty = $qty+1;
            $total_price = $product->pd_price * $qty;
            $carts = DB::table("carts")->insert([
                'product_id' => $product_id,
                'name' => $product->pd_name,
                'detail' => $product->pd_detail,
                'image' => $product->pd_image,
                'qty' => $qty,
                'price' => $product->pd_price,
                'total_price' => $total_price,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
              ]);

            return Redirect::to('cart');
        }
        if (Request::get('decrease') == 1) {
            $product_id = Request::get('id');
            $product = Product::find($product_id);
            $qty = $qty+1;
            $total_price = $product->pd_price * $qty;
            $carts = DB::table("carts")->insert([
                'product_id' => $product_id,
                'name' => $product->pd_name,
                'detail' => $product->pd_detail,
                'image' => $product->pd_image,
                'qty' => $qty,
                'price' => $product->pd_price,
                'total_price' => $total_price,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
              ]);
            return Redirect::to('cart');
        }
    }

    public function destroy($id)
    {
        $rowId = Cart::find($id);
        $rowId->delete();

        //return redirect()->back();
        return Redirect::to('cart');
    }

    //Add To Cart
    public function cart() {
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            $qty = 1;
            if (Request::get('increment') == 1) {
                $qty = $qty+1;
            }
            if (Request::get('decrease') == 1) {
                $qty = $qty-1;
            }
            $total_price = $product->pd_price * $qty;
            //กำหนดให้record product table ให้ตรงกับ record cart table
            /*Cart::add(array(
                'id'           => $product_id, 
                'name'         => $product->pd_name,
                'detail'       => $product->pd_detail,
                'image'        => $product->pd_image, 
                'qty'          => $qty,
                'price'        => $product->pd_price,
                'total_price'  => $total_price
            ));*/

            /*$cart = new Cart();
            $cart->product_id     = $product_id;
            $cart->name   = $product->pd_name;
            $cart->detail    = $product->pd_detail;
            $cart->image = $product->pd_image;
            $cart->qty  = $qty;
            $cart->price  = $product->pd_price;
            $cart->total_price  = $total_price;
            $cart->created_at  = \Carbon\Carbon::now()->toDateTimeString();
            $cart->updated_at  = \Carbon\Carbon::now()->toDateTimeString();
            $cart->save();*/

            $carts = DB::table("carts")->insert([
                'product_id' => $product_id,
                'name' => $product->pd_name,
                'detail' => $product->pd_detail,
                'image' => $product->pd_image,
                'qty' => $qty,
                'price' => $product->pd_price,
                'total_price' => $total_price,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
              ]);
        }

        //$carts = Cart::all();
        //$cart = Cart::content();//เรียกใช้เมธอดเนื้อหาของ Cart เพื่อส่งคืนคอลเล็กชันของรายการในตะกร้าสินค้า

        //increment the quantity

        
        //echo "<pre>"; print_r($carts); die;
        /*return view('cart.index', array(
            'carts'        => $carts,
            'title'       => 'Welcome', 
            'description' => '', 
            'page'        => 'home'
        ));*/ 
        //เพิ่มคอลเล็กชันที่ส่งคืนจาก Cart :: content () ไปยังรายการตัวแปรที่ส่งผ่านไปยังมุมมอง
        return Redirect::to('cart');
    }

    public function remove($id) {
        $rowId = Cart::find($id);
        //$rowId = Cart::find(array('id' => Request::get('product_id')));
        //Cart::destroy($rowId[0]);//ลบรายการที่เลือก
        $rowId->delete();

        //return redirect()->back();
        return Redirect::to('cart');
    }

    /*public function destroy() {
        Cart::destroy();//ลบทุกรายการ

        Session::flash('message', 'Successfully deleted the All Product!');
        return redirect()->back();
    }*/
}
