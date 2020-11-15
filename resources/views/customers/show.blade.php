@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <img src="/upload/profile_pic/{{$student->image}}" alt="" style="width:150px; height: 150px; border-radius: 50%; float: left">
            <h2 class="ml-3" style="margin-top: 4rem;">{{$user->name}}'s Profile</h2>
        </div>
        <div class="row mb-2 mt-5">
            <h2>Your Products </h2>
        </div>
        <div class="row">
            @if(count($user->products) > 0)
                @foreach($user->products as $product)
                    <div class="card mr-3" style="width: 15rem;">
                    <div class="card-header text-center bg-primary text-light">
                    Product #{{$product->id}} {{$product->name}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$product->ske}} </p>
                    </div>
                </div>        
                @endforeach
            @endif
        </div>
    </div>
@endsection