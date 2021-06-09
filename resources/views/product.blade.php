@extends('layouts.master')
@section('title','Товар')
@section('content'){{--Директива @section определяет секцию содержимого --}}
        <h1>{{$product->name}}</h1>
        <h2>{{$product->category->name}}</h2>
        <p>Цена: <b>{{$product->price}}</b></p>
        <img src="/storage/{{$product->image}}">
        <p>{{$product->description}}</p>

        <form action="{{route('basket-add',$product)}}" method="POST">

            @if($product->isAvailable())
                <button type="submit" class="btn btn-success" role="button">Забронировать</button>
            @else
                Не доступен
            @endif
                @csrf
        </form>
@endsection
