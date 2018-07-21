<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use Session;
use Image;
use File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function products(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('admin/products', compact('products'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'pd_name'   => 'required',
            'pd_detail' => 'required',
            'pd_price'  => 'required',
            'pd_image'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Redirect::to('admin/create')->withErrors($validator);
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
                Image::make($img)->resize(300, 300)->save($location);
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
        return View::make('admin.show')->with('show', $show);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return View::make('admin.edit')->with('product', $product);
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'pd_name'   => 'required',
            'pd_detail' => 'required',
            'pd_price'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            $product = Product::findOrfail($id);
            $product->pd_name        = Input::get('pd_name');
            $product->pd_detail  = Input::get('pd_detail');
            $product->pd_price  = Input::get('pd_price');
            if($request->hasFile('pd_image')){
                $image = $request->file('pd_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('/images/' . $filename);
                Image::make($image)->resize(100, 100)->save($location);
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
}
