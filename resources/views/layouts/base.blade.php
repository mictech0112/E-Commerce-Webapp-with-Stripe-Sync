<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ECサイト')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tailwind CSS (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- 他のCSSやJSを追加 -->
    @yield('styles')
</head>
<body class="font-sans antialiased">
    <header class="bg-white  flex p-3">
        <!-- 検索窓 -->
        <div class="me-auto">
            <button class="bg-black rounded-sm p-3">
                <a href="{{ route('top') }}">
                    <x-icons.search/>
                </a>
            </button>
        </div>
        <!-- Login -->
        @guest
        <div class="px-1">
            <button class="bg-black rounded-sm p-3  text-white">
                <a href="{{ route('login') }}">
                    LOGIN
                </a>
            </button>
        </div>
        @endguest


        <!-- カート -->
        <div class="px-1">
            <button class="bg-black rounded-sm p-3  text-white">
                <a href="{{ route('cart.index') }}">
                    <x-icons.cart/>
                </a>
            </button>
        </div>

        <!-- ハンバーガー -->
        <div class="px-1 relative">
            <button id="hamburgerBtn" class="bg-black rounded-sm p-3  text-white">
                <x-icons.humberger/>
            </button>
            <!-- メニューの内容 -->
            <div id="menu" class="absolute top-full right-0 bg-white border shadow-md hidden w-48">
                @auth
                    <!-- ログイン時のメニュー -->
                    <ul>
                        <li class="border-b p-2"><a href="{{ route('top') }}">ホーム</a></li>
                        <li class="border-b p-2"><a href="{{ route('top') }}">お気に入り</a></li>
                        <li class="border-b p-2"><a href="{{ route('top') }}">チャット</a></li>
                        <li class="border-b p-2"><a href="{{ route('top') }}">購入履歴</a></li>
                        <li class="border-b p-2"><a href="{{ route('top') }}">アカウント情報</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="margin:0;">@csrf
                            <li class="p-2"><button type="submit">ログアウト</button></li>
                        </form>
                    </ul>
                @else
                    <!-- ログアウト時のメニュー -->
                    <ul>
                        <li class="border-b p-2"><a href="{{ route('top') }}">ホーム</a></li>
                        <li class="border-b p-2 text-gray-400">お気に入り</li>
                        <li class="border-b p-2 text-gray-400">チャット</li>
                        <li class="border-b p-2"><a href="{{ route('top') }}">購入履歴</a></li>
                        <li class="border-b p-2"><a href="{{ route('top') }}">アカウント情報</a></li>
                        <li class="p-2"><a href="{{ route('login') }}">ログイン</a></li>
                    </ul>
                @endauth
        </div>
    </header>

    <main class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 mt-12">
        <p>©  SAUNA BASE. All rights reserved.</p>
    </footer>

    <!-- 追加のスクリプト -->
    @yield('scripts')
    </script>
</body>
</html>
