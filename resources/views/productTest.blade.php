@extends('layouts.layout')

@section('content')       
<section id="advertisement">
    <div class="container">
        <img src="{{asset('images/shop/advertisement.jpg')}}" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    @include('shared.sidebar')
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    @foreach ($products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('images/shop/product9.jpg')}}" alt="" />
                                    <h2>${{$product->price}}</h2>
                                    <p>{{$product->name}}</p>
                                    <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    <a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>${{$product->price}}</h2>
                                        <p>${{$product->name}}</p>


                                        <form method="POST" action="{{url('cart')}}">
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-fefault add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                        </form>

                                        
                                        <a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">»</a></li>
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection




public function cart() {
    //update/ add new item to cart
    if (Request::isMethod('post')) {
        $product_id = Request::get('product_id');
        $product = Product::find($product_id);
        Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
    }

    //increment the quantity
    if (Request::get('product_id') && (Request::get('increment')) == 1) {
        $rowId = Cart::search(array('id' => Request::get('product_id')));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty + 1);
    }

    //decrease the quantity
    if (Request::get('product_id') && (Request::get('decrease')) == 1) {
        $rowId = Cart::search(array('id' => Request::get('product_id')));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty - 1);
    }

    $cart = Cart::content();

    return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
}


$rowId = Cart::search(array('id' => Request::get('product_id')));
Cart::remove($rowId[0]);

Cart::destroy();



----------------------------------------------------------
 public function store(Request $request)
 {
     // get all items
     $products = Cart::content();
     
     // iterate through the products and store them into the database
     foreach($products as $product){
         Order::create([
             'product_id' => $product->id,
             'customer_id' => auth()->id(),
         ]);
     }
     
     return back();
 }
 ----------------------------------------------------------
 ----------------------------------------------------------
 ----------------------------------------------------------
 ----------------------------------------------------------
 