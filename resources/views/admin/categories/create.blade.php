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
                    	{{ Form::open(array('route' => 'categories.store', 'files' => true, 'method' => 'post')) }}

                    		<div class="form-row">
						        <div class="form-group col-md-8">
						          {{ Form::label('name', 'Category Name: ', array('class' => 'h4')) }}
						          {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'ชื่อประเภทสินค้า')) }}
						        </div>
						    </div>
					        <hr />
					        <a class="btn btn-small btn-success" href="{{ URL::to('admin/categories') }}"><span class="oi oi-chevron-left" aria-hidden="true"></span> Back</a>
					        <button type="submit" class="btn btn-primary"><span class="oi oi-plus" aria-hidden="true"></span> Add</button>
                    	{{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection