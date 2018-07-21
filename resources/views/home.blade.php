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

        <div class="row justify-content-center" style="height: 400px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1>{{ trans('layouts.Welcome') }}</h1></div>
                </div>
            </div>
        </div>
    </div>
@endsection