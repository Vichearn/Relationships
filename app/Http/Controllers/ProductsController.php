<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use DB;
use Session;
use Image;
use File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products(Request $request)
    {
        $products = Product::paginate(12);
        return view('products.index', compact('products'));
    }

    public function productShow($id)
    {
        $show = Product::find($id);
        return View::make('products.productShow')->with('show', $show);
    }

    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        //echo "<pre>"; print_r($products); die;
        return view('admin.products.products', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'pd_name'   => 'required|alpha',
            'pd_detail' => 'required',
            'pd_price'  => 'required|numeric',
            'pd_image'  => 'required|image'
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Redirect::to('admin/products/create')->withErrors($validator)->withInput();
        }
        else{
            $product = new Product();
            $product->pd_name     = Input::get('pd_name');
            $product->pd_detail   = Input::get('pd_detail');
            $product->pd_price    = Input::get('pd_price');
            $product->category_id = Input::get('category_id');
            $product->created_at  = Input::get('created_at');
            $product->updated_at  = Input::get('updated_at');
            if($request->hasFile('pd_image')){
                $img = $request->file('pd_image');
                $filename = time().'.'.$img->getClientOriginalExtension();
                $location = public_path('/images/'.$filename);
                Image::make($img)->resize(1200, 700)->save($location);
                $product->pd_image = $filename;
            }
            $product->save();
            Session::flash('message', 'Successfully Created Product');
            return Redirect::to('admin/products');
        }
    }

    public function show($id)
    {
        $show = Product::find($id);
        return View::make('admin.products.show')->with('show', $show);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return View::make('admin.products.edit')->with('product', $product);
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'pd_name'   => 'required',
            'pd_detail' => 'required',
            'pd_price'  => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin/products' . $id . '/edit')
                ->withErrors($validator);
        } else {
            $product = Product::findOrfail($id);
            $product->pd_name      = Input::get('pd_name');
            $product->pd_detail    = Input::get('pd_detail');
            $product->pd_price     = Input::get('pd_price');
            if($request->hasFile('pd_image')){
                $image = $request->file('pd_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('/images/' . $filename);
                Image::make($image)->resize(1200, 700)->save($location);
                File::delete('images/' . $product->pd_image);

                $product->pd_image = $filename;
            }
            $product->created_at  = $product->created_at;
            $product->updated_at  = Input::get('updated_at');
            $product->save();

            Session::flash('message', 'Successfully Updated Product!');
            return Redirect::to('admin/products');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete('images/' . $product->pd_image);
        $product->delete();

        Session::flash('message', 'Successfully deleted the Product!');
        return redirect()->back();
    }

    public function findCate(Request $request)
    {
        $pdCate = $request->categorySelected;

        $products = DB::table('products')->where('category_id', $pdCate)->get();
        return view('products.findCate', compact('products'));
    }

    public function findPc()
    {
        $productsCate = Product::where('category_id', 1)->paginate(4);
        return view('products.findPc', compact('productsCate'));
    }

    public function findNotebook()
    {
        $productsCate = Product::where('category_id', 2)->paginate(3);
        return view('products.findNotebook', compact('productsCate'));
    }

    public function findPhone()
    {
        $productsCate = Product::where('category_id', 3)->paginate(6);
        return view('products.findPhone', compact('productsCate'));
    }

    public function findTablet()
    {
        $productsCate = Product::where('category_id', 4)->paginate(2);
        return view('products.findTablet', compact('productsCate'));
    }

    public function search(Request $request){
      //$searchData = Input::get('searchl');
      $searchData = $request->search;

      //start query for search
      $products = DB::table('products')
      ->where('products.pd_name', 'like', '%' . $searchData . '%')
      ->get();
      return view('products.searchProduct')->with('products', $products);
    }
}
