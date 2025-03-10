@extends('layouts.default')

@section('title', 'マイページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}">
@endsection

@section('content')
<div class="container">
    <a class="logo" href="/home">Rese</a>
    <div class="mypage">
        <div class="left">
            <p class="user__name">{{$user->name}}さん</p>
            <p class="title left__title">予約状況</p>
            @foreach($reservations as $reservation)
            <div class="rese__card">
                <form class="form" action="/delete/{{$reservation->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="clock">
                        <i class="fas fa-clock"></i>
                        <p>予約</p>
                    </div>
                    <button class="btn">✕</button>
                </form>
                <table>
                    <tr>
                        <th>Shop</th>
                        <td>{{$reservation->store->name}}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{$reservation->reservation_date->format('Y-m-d')}}</td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>{{$reservation->reservation_time->format('H:i')}}</td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td>{{$reservation->number_of_people}}人</td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
        <div class="right">
            <p class="right__user--name">{{$user->name}}さん</p>
            <p class="title">お気に入り店舗</p>
            <div class="store__cards">
                @foreach($stores as $store)
                <div class="store__card">
                    <img src="{{asset($store->image_path)}}">
                    <div class="store__info">
                        <p class="store__name">{{$store->name}}</p>
                        <div class="hash">
                            <p>#{{$store->area->name}}</p>
                            <p>#{{$store->genre->name}}</p>
                        </div>
                        <div class="icon">
                            <a class="link" href="/detail/">詳しくみる</a>
                            <form action="{{$store->liked() ? '/unlike/'.$store->id : '/like/'.$store->id}}" method="post">
                            @csrf
                            @if($store->liked())
                                <button><i class="fas fa-heart like"></i></button>
                            @else
                                <button><i class="fas fa-heart unlike"></i></button>
                            @endif
                        </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection