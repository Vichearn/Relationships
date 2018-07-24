@extends('layouts.app')

@section('content')
		<br>
		<div class="dropdown show">
		  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    เลือกประเภทสินค้า
		  </a>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		    <a class="dropdown-item" href="{{ URL::to('products/findPc') }}">PC</a>
		    <a class="dropdown-item" href="{{ URL::to('products/findNotebook') }}">Notebook</a>
		    <a class="dropdown-item" href="{{ URL::to('products/findPhone') }}">Phone</a>
		    <a class="dropdown-item" href="{{ URL::to('products/findTablet') }}">Tablet</a>
		  </div>
		</div>
		<hr>
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
						สินค้าคงเหลือ <span class="badge badge-light">{{$show->pd_quantity}}
						</span>
					</button>
			        <form method="POST" action="{{url('add-to-cart/')}}">
                        <input type="hidden" name="product_id" value="{{$show->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    </form>
			      </div>
			    </div>
			    	<br />
			  </div>
			@endforeach
			<br>
		</div>
		{{ $productsCate->render() }}
@endsection