@extends('layouts.app')

@section('content')
    <marquee> ยินดีตอนรับเข้าสู่ระบบเว็บไซต์ขายสินค้าที่ได้มาตรฐานระดับโลก และมีลูกค้าประจำที่เยอะที่สุดในประเทศไทย </marquee>
    <!-- <marquee behavior="alternate" direction="up"    width="400"    height="100" bgcolor="#F5F5F5"scrolldelay="10" scrollamount="5" onmouseOver="this.stop()" onmouseOut="this.start()">
        ยินดีตอนรับเข้าสู่เว็บไซต์ของเรา
    </marquee> -->
    <div class="container">

        <!-- @if($errors->any())
        <div class="alert alert-info">{{$errors->first()}}</div>
        @endif -->

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="setmain">
                <div class="topsetmain">
                    <form action="{{ action('ProductsController@findCate') }}" method="GET">
                        <button class="btn btn-sm btn-primary" type="submit" 
                                value="1" 
                                name="categorySelected" 
                                href="{{ URL::to('products/findCate') }}" 
                                style="border-radius: 50px;">
                                PC
                        </button>
                        <button class="btn btn-sm btn-primary" type="submit" 
                                value="2" 
                                name="categorySelected" 
                                href="{{ URL::to('products/findCate') }}" 
                                style="border-radius: 50px;">
                                Notebook
                        </button>
                        <button class="btn btn-sm btn-primary" type="submit" 
                                value="3" 
                                name="categorySelected" 
                                href="{{ URL::to('products/findCate') }}" 
                                style="border-radius: 50px;">
                                Phone
                        </button>
                        <button class="btn btn-sm btn-primary" type="submit" 
                                value="4" 
                                name="categorySelected" 
                                href="{{ URL::to('products/findCate') }}" 
                                style="border-radius: 50px;">
                                Tablet
                        </button>
                    </form>   
                </div>
                <div class="leftsetmain">
                    <div class="headerleftsetmain">
                        
                    </div>
                    <div class="bodyleftsetmain">
                        
                    </div>
                    <div class="footerleftsetmain">
                        
                    </div>
                </div>
                <div class="rightsetmain">
                    <form action="{{ action('ProductsController@findCate') }}" method="GET">
                        <button class="btn btn-sm btn-primary" type="submit" 
                                value="1" 
                                name="categorySelected" 
                                href="{{ URL::to('products/findCate') }}" 
                                style="border-radius: 50px;">
                                PC
                        </button>
                        <button class="btn btn-sm btn-primary" type="submit" 
                                value="2" 
                                name="categorySelected" 
                                href="{{ URL::to('products/findCate') }}" 
                                style="border-radius: 50px;">
                                Notebook
                        </button>
                        <button class="btn btn-sm btn-primary" type="submit" 
                                value="3" 
                                name="categorySelected" 
                                href="{{ URL::to('products/findCate') }}" 
                                style="border-radius: 50px;">
                                Phone
                        </button>
                        <button class="btn btn-sm btn-primary" type="submit" 
                                value="4" 
                                name="categorySelected" 
                                href="{{ URL::to('products/findCate') }}" 
                                style="border-radius: 50px;">
                                Tablet
                        </button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
@endsection