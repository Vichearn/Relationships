@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{ $show->pd_name }}</h1>
    <div class="jumbotron" style="border: 1px solid black; padding-top: 20px;">
    <br/>
    	<img src="{!! url('/images/'.$show->pd_image) !!}" class="img-fluid" alt="Responsive image">
    <hr/>
    <table>
		<tr>
			<td width="110px">
				<strong>Product Name:</strong>
			</td>
			<td>
				{{ $show->pd_name }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>Product Details:</strong>
			</td>
			<td>
				{{ $show->pd_detail }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>Product Price:</strong>
			</td>
			<td>
				{{ $show->pd_price }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>Created Date:</strong>
			</td>
			<td>
				{{ $show->created_at }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>Updated Date:</strong>
			</td>
			<td>
				{{ $show->updated_at }}
			</td>
		</tr>
    </table>
    <hr/>
    <br/>
    <a class="btn btn-small btn-success" href="{{ url()->previous() }}">Back</a>
    <hr>
    <form method="POST" action="{{url('c/')}}">
        <input type="hidden" name="product_id" value="{{$show->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary add-to-cart">
            <i class="fa fa-shopping-cart"></i>
            Add to cart
        </button>
    </form>
    </div>
</div>
@endsection