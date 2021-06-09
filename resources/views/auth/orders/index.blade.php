@extends('auth.layouts.master')
@section('title', 'Заказы')
@section('content')
    <div class="col-md-12">
        <h1>Заказы</h1>

        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Имя
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    Когда отправлен
                </th>
                <th>
                    Сумма
                </th>
                <th>
                    Время
                </th>
                @if(Auth::user()->isAdmin())
                <th>
                    Действия
                </th>
                @else
                @endif
            </tr>
            @foreach($orders as $order)

            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->created_at->format('H:i d/m/Y')}}</td>
                <td>{{$order->getFullPrice()}} руб.</td>
                <td>

                    @php($date = \Illuminate\Support\Carbon::now()
                            ->subHours($order->created_at->format('H'))
                            ->subMinutes($order->created_at->format('i'))
                            ->subSeconds($order->created_at->format('s')))
                    <p>{{$date->format('H:i:s')}}</p>
                    @if($date->format('H')==24)
                    <div class="alert alert-warning">Время истекло</div>
                    @endif

                @if(Auth::user()->isAdmin())
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-success" type="button"

                           href="{{route('orders.show',$order)}}">Открыть</a>

                    </div>
                </td>
                @else
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
