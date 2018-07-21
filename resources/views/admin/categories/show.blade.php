@extends('admin.layouts.admin')

@section('content')
	<div class="container">
	    <h1>Showing : {{ $show->name }}</h1>
	    <div class="jumbotron">
		    <table>
				<tr>
					<td>
						<strong>Name:</strong>
					</td>
					<td>
						{{ $show->name }}
					</td>
				</tr>
		    </table>
		</div>
	    <a class="btn btn-small btn-success" href="{{ URL::to('admin/categories') }}">Back</a>
	</div>
@endsection
