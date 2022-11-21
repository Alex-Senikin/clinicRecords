@extends('layout')

@section('price_active') active @endsection
@csrf
@section('main_content')
    @foreach($priceList as $price)
        <h5>{{$price->service}}</h5>
        <p>{{$price->cost}}</p>
    @endforeach
@endsection
