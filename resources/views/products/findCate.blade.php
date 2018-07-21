@extends('layouts.app')

@section('content')
	<div class="container">
		<form action="{{ action('ProductsController@findCate') }}" method="GET">
            <button class="btn btn-sm btn-primary" type="submit" 
            		value="1" 
            		name="categorySelected" 
                    href="{{ URL::to('products/findCate') }}" 
                    style="border-radius: 50px;">
                    PC
            </button>
            <button class="btn btn-sm btn-primary" type="submit" 
            		value="2" 
            		name="categorySelected" 
                    href="{{ URL::to('products/findCate') }}" 
                    style="border-radius: 50px;">
                    Notebook
            </button>
            <button class="btn btn-sm btn-primary" type="submit" 
            		value="3" 
            		name="categorySelected" 
                    href="{{ URL::to('products/findCate') }}" 
                    style="border-radius: 50px;">
                    Phone
            </button>
            <button class="btn btn-sm btn-primary" type="submit" 
            		value="4" 
            		name="categorySelected" 
                    href="{{ URL::to('products/findCate') }}" 
                    style="border-radius: 50px;">
                    Tablet
            </button>
        </form>
		<br />
		<div id="ss"class="row">
			@foreach($products as $show)
			  <div class="col-sm-2">
			    <div class="card" style="width: 10rem;">
			    	
			    	<div class="dropdown">
			    		<a href="{{ URL::to('products/productShow/' . $show->id) }}">
					  		<img src="{!! url('/images/'.$show->pd_image) !!}" alt="Cinque Terre" width="158" height="150">
						</a>
					  <div class="dropdown-content">
					  	<a href="{{ URL::to('products/productShow/' . $show->id) }}">
					    	<img src="{!! url('/images/'.$show->pd_image) !!}" alt="Cinque Terre" width="270" height="200">
						</a>
					    <div class="desc">
					    	<a href="{{ URL::to('products/productShow/' . $show->id) }}">
					    		{{ $show->pd_name }}
					    	</a>
					    </div>
					  </div>
					</div>

			      <div class="card-body">
			        <h5 class="card-title">{{ $show->pd_name }}</h5>
			        <h3 class="card-title">
			        	{{ number_format($show->pd_price, 2) }}
			        </h3>
			        <p class="card-text">
			        	{{ \Illuminate\Support\Str::words($show->pd_detail, 5,'...') }}
			        </p>
			        <button type="button" class="btn btn-sm" style="margin-bottom: 10px;">
						สินค้าคงเหลือ <span class="badge badge-light">4</span>
					</button>
			        <a href="#" class="btn btn-primary">Add to Cart</a>
			      </div>
			    </div>
			    	<br />
			  </div>
			@endforeach
			<br>
		</div>
	</div>
@endsection


