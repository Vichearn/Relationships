@extends('admin.layouts.admin')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-6">
	            <div class="card">
	            	<div class="card-header">
					      <table class="table table-striped table-bordered">
		                    <thead align="center">
		                        <tr>
		                            <td>Category Name</td>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    @foreach($categories as $category)
		                        <tr>
		                        	<td><a href="{{ URL::to('admin/categories/' . $category->id) }}">{{ $category->name }}</a>

		                        	{{ Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'admin/categories/' . $category->id]) }}
	                                {{ Form::hidden('_method', 'DELETE') }}
	                                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', 'style' => 'float: right']) }}
	                                {{ Form::close() }}
		                        	</td>
		                        </tr>
		                        
		                    @endforeach
		                </table>
		                <a class="btn btn-dark" href="{{ URL::to('admin/products') }}">Back</a> |
            			<a class="btn btn-dark" href="{{ URL::to('admin/categories/create') }}">Add Category</a>
					</div>
		        </div>
	        </div>
	    </div>
	</div>
@endsection
