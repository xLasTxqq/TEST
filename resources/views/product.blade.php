@extends('master')
@section('title')
    Product
@endsection
@section('section')

    <div class="text-center">
        <h1 class="py-5">Product</h1>
    <h2>Name: {{$db->name}}</h2>
    <h3>Description{{$db->description}}</h3>
    <h3>Img: {{$db->img}}</h3>
    <h3>Cost: {{$db->cost}}</h3>
    <h3>Category: {{$cat->name}}</h3>
    </div>
@endsection
