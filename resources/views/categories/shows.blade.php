@extends('layouts.app')

@section('content')

<div class="container">
<h1>Showing : {{ $category->name }}</h1>

    <div class="jumbotron">
	    <table>
			<tr>
				<td>
					<strong>Name:</strong>
				</td>
				<td>
					{{ $category->name }}
				</td>
			</tr>
	    </table>
	</div>
    <a class="btn btn-small btn-success" href="{{ URL::to('categories') }}">Back</a> 
</div>
@endsection