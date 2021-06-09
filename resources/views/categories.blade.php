@extends('layouts.master')
@section('title','Все категории')
@section('content'){{--Директива @section определяет секцию содержимого --}}
        @foreach($categories as $category)
            <div class="panel">
                <a href="{{route('category',$category->code)}}">
                    <img height="250px" src="/storage/{{$category->image}}">
                    <h2>{{$category->name}}</h2>
                </a>
                <p>
                    {{$category->description}}
                </p>
            </div>
        @endforeach
@endsection
