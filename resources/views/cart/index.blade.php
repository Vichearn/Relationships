@extends('layouts.app')

@section('content')
<section id="cart_items">
    <br>
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}"> Home </a></li> &nbsp;/&nbsp;
                <li class="active"><a href="{{URL::to('cart')}}"> Shopping Cart </a></li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            @if($carts->isNotEmpty())
            <?php
                $i = 0;
                $total = 0;
                $total_qty = 0;
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image" style="text-align: center;">Item</td>
                        <td class="name"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $item)
                    <tr>                        
                        <td class="cart_product" style="text-align: center;">
                            <img src="{!! url('/images/'.$item->image) !!}" 
                                alt="Cinque Terre" 
                                width="50" 
                                height="50">                           
                        </td>
                        <td class="cart_description">
                            <h4>
                                <a href="#">{{$item->name}}
                                </a>
                            </h4>
                        </td>
                        <td class="cart_price">
                            <p>${{$item->price}}</p>
                        </td>

                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_down" 
                                    href="{{url("cart?id=$item->id&decrease=1")}}"> 
                                    -  
                                </a>
                                <input class="cart_quantity_input" 
                                    type="text" 
                                    name="quantity" 
                                    value="{{$item->qty}}" 
                                    autocomplete="off" size="2" style="text-align: center;"
                                    style="text-align: center;">
                                <a class="cart_quantity_up" 
                                    href="{{url("cart?id=$item->id&increment=1")}}">
                                    + 
                                </a>
                            </div>
                        </td>

                        <td class="cart_total">
                            <p class="cart_total_price">${{$item->total_price}}</p>
                        </td>
                        <td class="cart_delete">
                            {{ Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'cart/' . $item->id]) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    <?php 
                        $total = $total + $item->total_price;
                        $total_qty =  $total_qty + $item->qty;
                    ?>
                    @endforeach
                @else
                <?php
                    $i = 0;
                    $total = 0;
                    $total_qty = 0;
                ?>
                <h1 style="text-align: center;">You have no items in the shopping cart</h1>
                @endif
                </tbody>
                <tbody>
                    <td></td>
                    <td></td>
                    <td>Total:</td>
                    <td>
                        &nbsp;
                        <label>{{ $total_qty }} &nbsp;&nbsp; Piece</label>                   
                    </td>
                    <td>
                        <label>${{ $total }}</label>                   
                    </td>
                </tbody>
            </table>
            <a class="btn btn-lg btn-primary" href="#" style="float: right;">Check Out</a>
        </div>        
    </div>   
</section> <!--/#cart_items-->

<hr>

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        
                    </ul>
                    <a class="btn btn-default update" href="{{url('clear-cart')}}">Clear Cart</a>
                    <a class="btn btn-default check_out" href="{{url('checkout')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection