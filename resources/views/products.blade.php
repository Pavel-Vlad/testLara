@extends('layouts.index')
@section('page')
    <main class="main">
        <header class="header">
            <div class="header__title">
                ПРОДУКТЫ
            </div>
            <div class="header__user">
                @guest
                    <a href="/login">Войти</a>
                @endguest

                @auth
                    <a href="/home">{{Auth::user()->name}}</a>
                @endauth
            </div>
        </header>
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="page">
            <table class="items">
                <tr class="items__head">
                    <th class="hidden">id</th>
                    <th>АРТИКУЛ</th>
                    <th>НАЗВАНИЕ</th>
                    <th>СТАТУС</th>
                    <th>АТРИБУТЫ</th>
                </tr>
                @forelse ($products as $product)
                    <tr class="items__row">
                        <td class="hidden">{{$product->id}}</td>
                        <td>{{$product->article}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->status}}</td>
                        <td>
                            @foreach($product->data ?? [] as $key => $value)
                                {{$key}}:{{$value}}<br>
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            Продукты не найдены
                        </td>
                    </tr>
                @endforelse
            </table>
            <button id="btn_add" class="btn btn_absolute">Добавить</button>
            @include('parts/popik')
        </section>
    </main>
@endsection
