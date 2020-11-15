@extends('layouts.app')

@section('content')

<div class="wrapper">
    <main>
        <div class="container" > 
            <div class="p-3" style="text-align:center">
                <h1 style="color:#E44D3A; font-size:50px;"><strong> Products</strong></h1> 
            </div>                    
                
            <div  style="text-align:left;">
                <img  src="{{ url('design/style') }}/images/circle-cropped (2).png" width="15" height="15" class="mr-2">
                <h5 style="color:#E44D3A;"><strong>Click Add to Add to your  Shopping Cart, click to remove to Delete</strong></h5><br>
            </div>
            
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="container col-6 p-3">
                            @foreach ($products as $product)
                <div class="card mr-3" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">Product Name :{{$product->name}}</h5>
                        <p class="card-text">Product Ske :{{$product->ske}}</p>
                        @if (in_array($product->id , $cu_products )) 
                        <a href="{{route('detach', $product->id)}}" class="btn btn-secondary mr-3">REMOVE</a>
                        @else
                        <a href="{{route('attach', $product->id)}}" class="btn btn-primary mr-3">ADD</a>  
                        @endif
                        <a href="{{route('product.show', ['product' => $product])}}" class="btn btn-info">Show details</a>
                    </div>
                </div>
            @endforeach
                        </div>
                    </div>
                </div>   
            </div>
        </div>  
    </main>
</div>
@endsection
