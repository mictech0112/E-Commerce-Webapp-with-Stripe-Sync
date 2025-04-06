@extends('layouts.base')

@section('title', 'カート一覧')

@section('header', 'カート一覧')

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
        <!-- カート一覧 -->
        <div class="mb-8">
            <x-flash-message status="session('status')" />
            <h2 class="text-xl font-bold mb-6">カートに入っているアイテム</h2>
            
            @if (count($products) > 0)
                <div class="mb-8">
                    <!-- ヘッダー行 -->
                    <div class="grid grid-cols-5 gap-4 font-medium text-gray-600 mb-4 pb-2 border-b">
                        <div class="col-span-2">アイテム名</div>
                        <div class="text-center">価格</div>
                        <div class="text-center">個数</div>
                        <div class="text-right">小計</div>
                    </div>
                    
                    <!-- 商品リスト -->
                    @foreach ($products as $product)
                        <div class="grid grid-cols-5 gap-4 items-center py-4 border-b">
                            <!-- 商品画像と名前 -->
                            <div class="col-span-2 flex items-center">
                                @if($product->imageFirst)
                                    <img src="{{ asset('storage/products/' . $product->imageFirst->filename) }}" 
                                         class="w-20 h-20 object-cover mr-4" 
                                         alt="{{ $product->name }}">
                                @endif
                                <span class="text-lg">{{ $product->name }}</span>
                            </div>
                            
                            <!-- 単価 -->
                            <div class="text-center text-lg">
                                ¥{{ number_format($product->price) }}
                            </div>
                            
                            <!-- 数量 -->
                            <div class="flex items-center justify-center space-x-2 pl-12">
                                <form method="post" action="{{ route('cart.update', ['product' => $product->id]) }}" class="flex items-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="quantity" value="{{ $product->pivot->quantity - 1 }}">
                                    <button type="submit" class="w-8 h-8 rounded-full border flex items-center justify-center hover:bg-gray-100">
                                        −
                                    </button>
                                </form>
                                
                                <span class="text-lg mx-2">{{ $product->pivot->quantity }}</span>
                                
                                <form method="post" action="{{ route('cart.update', ['product' => $product->id]) }}" class="flex items-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="quantity" value="{{ $product->pivot->quantity + 1 }}">
                                    <button type="submit" class="w-8 h-8 rounded-full border flex items-center justify-center hover:bg-gray-100">
                                        +
                                    </button>
                                </form>

                                <form method="post" action="{{ route('cart.remove', ['product' => $product->id]) }}" class="ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-500 transition-colors pr-6 mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            
                            <!-- 小計 -->
                            <div class="text-right text-lg font-medium pl-10">
                                ¥{{ number_format($product->pivot->quantity * $product->price) }}
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- 合計金額 -->
                <div class="flex justify-between items-center mb-8 py-4 border-t border-b">
                    <div class="text-xl font-bold">合計</div>
                    <div class="text-2xl font-bold">¥{{ number_format($totalPrice) }}<span class="text-base font-normal">円(税込)</span></div>
                </div>
                
                <!-- ボタングループ -->
                <div class="flex flex-col space-y-4">
                    <a href="{{ route('cart.checkout') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded text-center text-lg">
                        注文画面へ進む
                    </a>
                    <a href="{{ route('top') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-3 px-6 rounded text-center text-lg">
                        ショッピングを続ける
                    </a>
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 mb-6 text-lg">カートに商品がありません</p>
                    <a href="{{ route('top') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-8 rounded inline-block text-lg">
                        商品を探す
                    </a>
                </div>
            @endif
        </div>    
    </div>
</div>
@endsection

@section('scripts')
@endsection
