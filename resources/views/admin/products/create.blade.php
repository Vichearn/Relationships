@extends('admin.layouts.admin')

@section('content')	
	<div class="container">
		{{ HTML::ul($errors->all()) }}
	    	@if (Session::has('message'))
	        	<div class="alert alert-info">{{ Session::get('message') }}</div>
	    	@endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border: 1px solid blue;">
                    <div class="card-header">
                    	{{ Form::open(array('route' => 'products.store', 'files' => true, 'method' => 'post')) }}

                    		<div class="form-row">
                    			<div class="form-group col-md-6">
						          {{ Form::label('category->id', 'Product Category: ', array('class' => 'h4')) }}
								  {{ Form::select('category_id',
								  	[
								  	   '0' => 'Selcet',
									   '1' => 'PC',
									   '2' => 'Notebook',
									   '3' => 'Phone',
									   '4' => 'Tablet'
									], array('class' => 'dropdown-menu')) }}			          
						        </div>

						        <div class="form-group col-md-8">
						          {{ Form::label('pd_name', 'Product Name: ', array('class' => 'h4')) }}
						          {{ Form::text('pd_name', Input::old('pd_name'), array('class' => 'form-control', 'placeholder' => 'ชื่อสินค้า')) }}
						        </div>

						        <div class="form-group col-md-8">
						          {{ Form::label('pd_detail', 'Product Detail: ', array('class' => 'h4')) }}
						          {{ Form::textarea('pd_detail', Input::old('pd_detail'), array('class' => 'form-control', 'placeholder' => 'รายละเอียดสินค้า')) }}
						        </div>

						        <div class="form-group col-md-8">
						          {{ Form::label('pd_price', 'Product Price: ', array('class' => 'h4')) }}
						          {{ Form::text('pd_price', Input::old('pd_price'), array('class' => 'form-control', 'placeholder' => 'ราคาสินค้า')) }}
						        </div>

						        <div class="form-group col-md-8">
						          {{ Form::label('pd_image', 'Product Image: ', array('class' => 'h4')) }}
						          {{ Form::file('pd_image', Input::old('pd_image'), array('class' => 'form-control', 'placeholder' => 'รูปภาพสินค้า')) }}
						        </div>
						    </div>
					        <hr />
					        <a class="btn btn-small btn-success" href="{{ URL::to('admin/products') }}"><span class="oi oi-chevron-left" aria-hidden="true"></span> Back</a>
					        <button type="submit" class="btn btn-primary"><span class="oi oi-plus" aria-hidden="true"></span> Add</button>
                    	{{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
