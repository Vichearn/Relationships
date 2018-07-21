@extends('layouts.app')

@section('content')
	<div class="container">
		<br />
		<div class="row">
			@foreach($productsCate as $show)
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
			        <h5 class="card-title">{{$show->pd_name}}</h5>
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
		{{ $productsCate->render() }}
	</div>
@endsection