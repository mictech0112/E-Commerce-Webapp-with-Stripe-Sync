@extends('layouts.base')

@section('title', '商品詳細')

@section('header', '商品詳細')

@vite('resources/js/detail.js')

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
        <!-- 商品一覧 -->
        <div class="breadcrumb text-sm mb-4">
            HOME > {{ $primaryCategory->name }} > {{ $secondaryCategory->name }}
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- 画像ギャラリー -->
            <div class="product-gallery">
                <div class="main-image-container relative mb-4 bg-gray-100" style="aspect-ratio: 1 / 1; max-height: 500px;">
                    <div class="w-full h-full flex items-center justify-center">
                        @if (!empty($product->imageFirst?->filename))
                        <img id="mainImage" 
                             src="{{ asset('storage/products/' . $product->imageFirst->filename) }}" 
                             class="max-w-full max-h-full object-contain" 
                             alt="{{ $product->name }}">
                        @else
                             <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                 <span class="text-gray-500"></span>
                             </div>
                        @endif
                    </div>
                    
                    <button id="prevBtn" class="absolute left-0 top-1/2 top-50 bg-gray-800 text-white p-2 transform -translate-y-1/2">◀</button>
                    <button id="nextBtn" class="absolute right-0 top-1/2 bg-gray-800 text-white p-2 transform -translate-y-1/2">▶</button>
                                        
                    <div id="imageCount" class="absolute bottom-2 right-2 bg-black text-white px-2 py-1 rounded opacity-75"></div>
                </div>
                
                <div class="thumbnail-gallery grid grid-cols-4 gap-2">
                    @php
                        $images = array_filter([
                            !empty($product->imageFirst?->filename) ? asset('storage/products/' . $product->imageFirst->filename) : null,
                            !empty($product->imageSecond?->filename) ? asset('storage/products/' . $product->imageSecond->filename) : null,
                            !empty($product->imageThird?->filename) ? asset('storage/products/' . $product->imageThird->filename) : null,
                            !empty($product->imageFourth?->filename) ? asset('storage/products/' . $product->imageFourth->filename) : null
                        ]);
                    @endphp
                    @for ($i = 0; $i < 4; $i++)
                        @if (isset($images[$i]))
                            <img src="{{ $images[$i] }}" 
                                 class="thumbnail w-full h-20 object-cover object-center cursor-pointer {{ $i === 0 ? 'border-2 border-blue-500' : '' }}" 
                                 data-index="{{ $i }}" 
                                 alt="Thumbnail {{ $i + 1 }}">
                        @else
                            <div class="w-full h-20 bg-gray-200 flex items-center justify-center">
                                 <span class="text-gray-500"></span>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <!-- 商品情報 -->
            <div>
                <h1 class="text-2xl mb-4">{{ $product->name }}</h1>
                <p class="text-3xl font-bold text-gray-600 mb-4">¥{{ number_format($product->price) }}<span class="text-sm text-gray-500">  税込</span></p>
                
                <div class="mb-4">
                    @if ($product->is_soldout || $quantity <= 0)
                        <button class="w-full bg-gray-400 text-white py-2 rounded flex items-center justify-center cursor-not-allowed">
                            SOLD OUT
                        </button>
                    @else
                    <form method="post" action="{{ route('cart.add')}}">
                        @csrf
                        <div class="flex items-center space-x-2 mb-4">
                            <span class="mr-3">数量： </span>
                            <div class="relative">
                                <select name="quantity" class="w-16 h-8 rounded border border-gray-300 py-1 px-6 pl-1 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500  text-left">
                                    @for ($i = 1; $i <= $quantity; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>  
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-indigo-500 text-white py-2 rounded flex items-center justify-center hover:bg-indigo-600">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            カートに入れる
                        </button>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </form>
                    @endif
                </div>

                <div class="mb-4">
                    <button class="border rounded px-4 py-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-300 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                        </svg>
                        お気に入りに追加
                    </button>
                </div>

                <div class="product-description">
                    <p>{{ $product->information }}</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
