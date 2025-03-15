@extends('layouts.base')

@section('title', '商品一覧')

@section('header', '商品一覧')

@vite('resources/js/top.js')
@vite('resources/css/top.css')

@section('content')
<div class="mb-4">
    @auth
        {{ Auth::user()->name }} さん
    @else
        ゲストユーザ さん
    @endauth
</div>

<div class="container mx-auto">
    <!-- トップイメージ -->
    <div class="flex justify-center mb-6">
        <img class="mx-auto" width="200" src="/images/logo.png">
    </div>
    <!-- ナビゲーション -->
    <div class="w-[45%] mx-auto">
        <div class="mb-4">
            <ul class="flex justify-start gap-3 text-xs">
                <li>
                    <a href="{{ route('top') }}">HOME</a>
                </li>
                <li>
                    <a href="{{ route('top') }}">ABOUT</a>
                </li>
                <li>
                    <a href="{{ route('top') }}">FAQ</a>
                </li>
                <li>
                    <a href="{{ route('top') }}">CATEGORY</a>
                </li>
                <li>
                    <a href="{{ route('top') }}">SALE</a>
                </li>
            </ul>
        </div>
        <!-- 広告 -->
        <div class="mb-4 relative">
            <button id="prevBtn" class="absolute left-0 top-1/2 top-50 bg-gray-800 text-white p-2">◀</button>
            <button id="nextBtn" class="absolute right-0 top-1/2 bg-gray-800 text-white p-2">▶</button>
            <img src="/images/top_image1.png" id="slide-image" alt="">
        </div>
        <!-- 商品一覧 -->
        <div class="grid grid-cols-4 gap-4 mb-4">
            @foreach ($products as $product)
            <div class="w-full fs-7">
                <img src="{{ asset($product->filename) }}" class="w-full" alt="Default profile">
                <p class=>{{ $product->name }}</p>
                <p class=>¥{{ number_format($product->price)  }}</p>
            </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
