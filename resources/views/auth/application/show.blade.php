@extends('auth.layouts.master')

@section('title', 'Заявка ' . $application->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $application->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $application->id}}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $application->name }}</td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{ $application->category->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $application->email }}</td>
            </tr>
            <tr>
                <td>Вес</td>
                <td>{{ $application->weight }}</td>
            </tr>
            <tr>
                <td>Проба</td>
                <td>{{ $application->sample }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $application->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{$application->image}}" height="240px"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
