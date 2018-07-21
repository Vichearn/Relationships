@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-12">
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
		                        	<td><a href="{{ URL::to('categories/' . $category->id) }}">{{ $category->name }}</a></td>
		                        </tr>
		                    @endforeach
		                </table>
            			<a class="btn btn-dark" href="{{ URL::route('categories.create') }}">Add Category</a>
					</div>
		        </div>
	        </div>
	    </div>
	</div>
@endsection
