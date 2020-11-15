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
            
           
            
                    <div class="card mr-3" style="width: 15rem;">
                    <div class="card-header text-center">
                    Product Photo
                    </div>
                    <div class="card-body">
                        <h5>Name: {{$product->name}}</h5>
                        <p class="card-text">SKE: {{$product->ske}}</p>
                    </div>
                </div>        
                     </div>
                    </div>
                </div>   
            </div>
        </div>  
    </main>
</div>
@endsection
