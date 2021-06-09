@extends('auth.layouts.master')

@section('title', 'Товары')

@section('content')
    <div class="col-md-12">
        @if(Auth::check() && Auth::user()->is_admin==1)
            <h1>Все заявки</h1>
            @endif
            @if(Auth::check() && Auth::user()->is_admin==0)
        <h1>Мои заявки</h1>
            @endif
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Название
                </th>
                <th>
                    Категория
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->id}}</td>
                    <td>{{ $application->name }}</td>
                    <td>{{ $application->category->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            @if(Auth::user()->isAdmin())
                            <form action="{{ route('application.destroy', $application) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить">
                            </form>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('application.edit', $application) }}">Редактировать</a>
                            @endif
                                <a class="btn btn-success" type="button"
                                   href="{{ route('application.show', $application) }}">Открыть</a>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button" href="{{ route('application.create') }}">Добавить заявку</a>
    </div>
@endsection
