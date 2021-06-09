@extends('layouts.master')
@section('title','Категория')
@section('content'){{--Директива @section определяет секцию содержимого --}}
    <h1>Новинки</h1>
        <div class="wrapper">
            <div class="slider single-item">
                @foreach($products as $product)
                    @if($product->isNew()==1)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="labels">
                                @if($product->isNew())
                                    <span class="badge badge-success">Новинка</span>
                                @endif
                            </div>
                            <img src="storage/{{$product->image}}" alt="iPhone X 64GB">
                            <div class="caption">
                                <h3>{{$product->name}}</h3>
                                <p>{{$product->price}} руб</p>
                                <p>
                                <form action="{{route('basket-add',$product)}}" method="POST">
                                    @csrf
                                    @if($product->isAvailable())
                                        <button type="submit" class="btn btn-primary" role="button">Забронировать</button>
                                    @else
                                        Не доступен
                                    @endif
                                    <a href="{{route('product',[$product->category->code,$product->code])}}" class="btn btn-default" role="button">Подробнее</a>
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

    <section id="contact">
        <div class="fullwidth-section half-padding">
            <div class="container">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <h1 class="kill-top-margin uppercase">Как нас найти?</h1>
                        <h4 class="weight-400">Позвоните или напишите нам! Мы ждём Вас!</h4>
                    </div>
                </div>
            </div>
            <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/1095/abakan/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Абакан</a><a href="https://yandex.ru/maps/1095/abakan/house/ulitsa_tarasa_shevchenko_69/bUgYcgJmQEIBQFtpfXtzcXtlbA==/?ll=91.456976%2C53.720768&utm_medium=mapframe&utm_source=maps&z=17.06" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Тараса Шевченко, 69 — Яндекс.Карты</a><iframe src="https://yandex.ru/map-widget/v1/-/CCUa4MuIXD" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
            <div class="container">
                <div class="row" style="margin-top: 40px;">
                    <div class="col-md-3">
                        <div class="icon-feature-horizontal-sm">
                            <div class="icon">
                                <i class="im-mail2 color-primary ae"><img src="img/location.png" alt="" style="width: 20px;height: 20px"></i>
                            </div>
                            <div class="content">
                                <h4 class="uppercase weight-700">Мы находимся</h4>
                                <p>
                                    <strong class="color-primary">Абакан</strong><br/>
                                    Тараса Шевченко, 69<br/>
                                    1 этаж<br/>
                                </p>
                            </div>
                        </div>
                        <div class="icon-feature-horizontal-sm">
                            <div class="icon">
                                <i class="im-mail2 color-primary ae"><img src="img/phone.png" alt="" style="width: 20px;height: 20px"></i>
                            </div>
                            <div class="content">
                                <h4 class="uppercase weight-700">Звоните нам</h4>
                                <p>
                                    <a href="#">mail@mail.com</a><br/>
                                    Тел.: +7‒933‒998‒84‒88<br/>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="icon-feature-horizontal-sm">
                            <div class="icon">
                                <i class="im-clock color-primary ae"><img src="img/time.png" alt="" style="width: 20px;height: 20px"></i>
                            </div>
                            <div class="content">
                                <h4 class="uppercase weight-700">Время работы</h4>
                                <p>
                                    <strong>Ежедневно</strong> с 09:00 до 19:00<br/>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
