@extends('auth.layouts.master')

@isset($application)
    @section('title', 'Редактировать товар ' . $application->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($application)
            <h1>Редактировать товар <b>{{ $application->name }}</b></h1>
        @else
            <h1>Добавить товар</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($application)
              action="{{ route('application.update', $application) }}"
              @else
              action="{{ route('application.store') }}"
            @endisset
        >
            <div>
                @isset($application)
                    @method('PUT')
                @endisset
                @csrf
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Имя: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error',['fieldName'=>'name'])
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($application){{ $application->name }}@endisset">
                    </div>
                </div>
                <br>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error',['fieldName'=>'category_id'])
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @isset($application)
                                        @if($application->category_id == $category->id)
                                        selected
                                    @endif
                                    @endisset
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <br>
                    <div class="input-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email: </label>
                        <div class="col-sm-6">
                            @include('auth.layouts.error',['fieldName'=>'email'])
                            <input type="text" class="form-control" name="email" id="email"
                                   value="@isset($application){{ $application->email }}@endisset">
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="weight" class="col-sm-2 col-form-label">Вес: </label>
                        <div class="col-sm-6">
                            @include('auth.layouts.error',['fieldName'=>'weight'])
                            <input type="text" class="form-control" name="weight" id="weight"
                                   value="@isset($application){{ $application->weight }}@endisset">
                        </div>
                    </div>
                <br>
                    <div class="input-group row">
                        <label for="sample" class="col-sm-2 col-form-label">Проба: </label>
                        <div class="col-sm-6">
                            @include('auth.layouts.error',['fieldName'=>'sample'])
                            <input type="text" class="form-control" name="sample" id="sample"
                                   value="@isset($application){{ $application->sample }}@endisset">
                        </div>
                    </div>
                    <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error',['fieldName'=>'description'])
                        <textarea name="description" id="description" cols="72"
                                  rows="7">@isset($application){{ $application->description }}@endisset</textarea>
                    </div>
                </div>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image" >
                        </label>
                    </div>
                </div>
                <br>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
