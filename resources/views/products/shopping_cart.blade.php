@extends('layouts.app')

@section('content')

<div class="wrapper">
    <main>
        <div class="container" > 
            <div class="p-3" style="text-align:center">
                <h1 style="color:#E44D3A; font-size:50px;"><strong>Your Shopping Cart</strong></h1> 
            </div>                    
            
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="container col-6 p-3">
                            @foreach ($products as $product)
                        @if (in_array($product->id , $cu_products )) 
                        <div class="card mr-3" style="width: 18rem;">
                    <div class="card-body">
                    <img style="width: 50px;" src="/uploads/images/{{$product->image}}" class="card-img-top" alt="...">
                        <h5 class="card-title">Product Name :{{$product->name}}</h5>
                        <p class="card-text">Product Ske :{{$product->ske}}</p>
                        <a href="{{route('detach', $product->id)}}" class="btn btn-secondary mr-3">REMOVE</a>
                        <a href="{{route('product.show', ['product' => $product])}}" class="btn btn-info">Show details</a>
                        @endif
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
