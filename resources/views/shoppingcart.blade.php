@extends('layouts.app')

@section('content')

<div class="wrapper">
    <main>
        <div class="container" > 
            <div class="p-3" style="text-align:center">
                <h1 style="color:#E44D3A; font-size:50px;"><strong> Your Shopping Cart</strong></h1> 
            </div>                    
                
            <div  style="text-align:left;">
                <img  src="{{ url('design/style') }}/images/circle-cropped (2).png" width="15" height="15" class="mr-2">
                <h5>Added To Your Shopping Cart, click to remove</h5><br>
                <img  src="{{ url('design/style') }}/images/INFO.png" width="15" height="15" class="mr-2">
                <h5>Click To Add To Your Shopping Cart</h5></br>
            </div>
            
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="container col-6 p-3">
                            @foreach ($products as $product)
                                @if (in_array($product->id , $cats )) 
                                    <a href="{{route('detach', $cat->id)}}">
                                    <button type="button"  class="btn btn-dark btn-lg btn-block" >{{$cat->name}}</button></a></br>
                                @else  
                                    <a href="{{route('attach', $cat->id)}}">
                                    <button type="button"  class="btn btn-info btn-lg btn-block" >{{$cat->name}}</button></a></br>
                                @endif 
                            @endforeach 
                        </div>
                    </div>
                </div>   
            </div>
        </div>  
    </main>
</div>
@endsection
