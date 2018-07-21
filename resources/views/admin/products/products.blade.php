@extends('admin.layouts.admin')

@section('content')	
	<a class="btn btn-dark" href="{{ URL::to('/admin/products/create/') }}" style="border-radius: 50px;">
	    <span class="oi oi-plus" aria-hidden="true"></span> 
	    Add Product
	</a>
	<a class="btn btn-dark" href="{{ URL::to('/admin/categories') }}" style="border-radius: 50px;">
	    Category View
	</a>
	<a class="btn btn-dark" href="{{ URL::to('/admin/categories') }}" style="border-radius: 50px;">
	    ..........
	</a>
	<a class="btn btn-dark" href="{{ URL::to('/admin/categories') }}" style="border-radius: 50px;">
	    ..........
	</a>
	<a class="btn btn-dark" href="{{ URL::to('/admin/categories') }}" style="border-radius: 50px;">
	    ..........
	</a>
	<a class="btn btn-dark" href="{{ URL::to('/admin/categories') }}" style="border-radius: 50px;">
	    ..........
	</a>
	<div class="container">
		@yield('content')
		<br/>
		<div class="row justify-content-center">
	        <div class="col-md-12">
	        	{{ HTML::ul($errors->all()) }}
	        	@if (Session::has('message'))
	            	<div class="alert alert-info">{{ Session::get('message') }}</div>
	        	@endif
	            <div class="card" style="border: 2px solid black; padding-top: 20px;">
	            	<div class="card-header">
					      <table class="table table-striped table-bordered" style="border-top: double; border-bottom: double;">
		                    <thead align="center">
		                        <tr>
		                            <th>Product Name</th>
		                            <th>Product Detail</th>
		                            <th>Product Price</th>
		                            <th>Product Type</th>
		                            <th>Product Image</th>
		                            <th colspan="3">Actions</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    @foreach($products as $key => $value)
		                        <tr>
		                            <td> {{ $value->pd_name }}</td>
		                            <td> 
		                            	{{ \Illuminate\Support\Str::words($value->pd_detail, 3,'...') }}
		                            </td>
		                            <td> {{ $value->pd_price }}</td>
		                            <td> {{ $value->category->name }}</td>
		                            <td style="text-align: center;">
		                            	<div class="dropdown">
										  <img src="{!! url('images/'.$value->pd_image) !!}" alt="Cinque Terre" width="80" height="50">
										  <div class="dropdown-content">
										    <img src="{!! url('images/'.$value->pd_image) !!}" alt="Cinque Terre" width="300" height="200">
										    <div class="desc">{{ $value->pd_name }}</div>
										  </div>
										</div>
		                            </td>
		                            <td><a href="{{ URL::to('/admin/products/' . $value->id) }}">Show</a></td>
		                            <td><a href="{{ URL::to('/admin/products/' . $value->id . '/edit') }}">
		                            	Edit
		                        	</a></td>
		                            <td>
		                            {{ Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'admin/products/' . $value->id]) }}
	                                {{ Form::hidden('_method', 'DELETE') }}
	                                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
	                                {{ Form::close() }}
	                            	</td>
		                        </tr>
		                    @endforeach
		                </table>
					</div>
		        </div>
		        <br/>
		        {{ $products->render() }}
	        </div>
	    </div>
	</div>
@endsection