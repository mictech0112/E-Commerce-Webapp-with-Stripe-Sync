<x-app-layout>
  <div class="flex h-screen bg-gray-50">
      <!-- サイドバー -->
      <div class="w-64 border-r bg-white">

        <nav class="p-2">
            <div class="mt-40 py-4 px-3 hover:bg-blue-50 text-gray-600 rounded-md mb-1 flex items-center">
              <a href="{{ route('admin.products.index') }}" class="flex items-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span>商品管理</span>
              </a>
            </div>
          
            <div class="py-4 px-3 text-gray-600 hover:bg-blue-50 rounded-md mb-1 flex items-center">
              <a href="{{ route('admin.images.index') }}" class="flex items-center w-full">
                <svg class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>画像管理</span>
              </a>
            </div>
          
            <div class="py-4 px-3 text-gray-600 hover:bg-blue-50 rounded-md mb-1 flex items-center">
              <a href="#" class="flex items-center w-full">
                <svg class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
                <span>発送管理</span>
              </a>
            </div>
          
            <div class="py-4 px-3 text-gray-600 hover:bg-blue-50 rounded-md mb-1 flex items-center">
              <a href="#" class="flex items-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <span>チャット</span>
              </a>
            </div>
          
            <div class="mt-auto p-4 border-t">
              <form method="POST" action="{{ route('admin.logout') }}">
                  @csrf
                  <div class="py-2 px-3 text-gray-600 hover:bg-blue-50 rounded-md mb-1 flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                      </svg>
                      <a :href="route('admin.logout')"
                         onclick="event.preventDefault();
                                  this.closest('form').submit();">
                          {{ __('ログアウト') }}
                      </a>
                  </div>
              </form>
          </div>
          </nav>
      </div>

      <!-- メインコンテンツ -->
      <div class="flex-1 flex flex-col overflow-hidden">

          <!-- メインコンテンツエリア -->
          <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
              <x-flash-message status="session('status')" />
              <div class="flex justify-between items-center mb-6">
                  <h1 class="text-2xl font-medium text-gray-800">商品管理</h1>
                  <button onclick="location.href='{{ route('admin.products.create')}}'" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm font-medium">新規商品登録</button>
              </div>
              <div class="bg-white shadow-sm border-b flex items-center justify-between p-4">
                <div class="flex items-center">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" placeholder="検索..." class="pl-10 pr-4 py-2 border rounded-lg w-80">
                    </div>
                </div>
            </div>
              <div class="bg-white rounded-lg shadow">
                  <div class="p-4 border-b">
                      <div class="flex space-x-2">
                          <select class="border rounded-md px-3 py-2 text-sm">
                              <option>すべてのカテゴリ</option>
                          </select>
                          <select class="border rounded-md px-3 py-2 text-sm">
                              <option>すべての状態</option>
                          </select>
                      </div>
                  </div>
                  
                  <div class="overflow-x-auto">
                      <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                              <tr>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">商品名</th>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">画像</th>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">在庫</th>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">価格</th>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">状態</th>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">アクション</th>
                              </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                              @foreach ($shopInfo as $shop)
                              @foreach ($shop->product as $product)
                              <tr>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                      <div class="text-sm text-gray-500">#{{ $product->id }}</div>
                                  </td>
                                  <td class="px-6 py-4 border-b text-sm text-gray-900">
                                    @if ($product->imageFirst)
                                        <img src="{{ asset('storage/products/' . $product->imageFirst->filename) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded mr-4">
                                    @else
                                        <span class="text-gray-500"></span>
                                    @endif
                                </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="text-sm text-gray-900 ml-2">{{ $product->quantity }}</div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="text-sm text-gray-900">¥{{ number_format($product->price) }}</div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      @if ($product->is_selling)
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">販売中</span>
                                      @else
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">停止中</span>
                                      @endif
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm">
                                      <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">編集</a>
                                      <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('本当に削除しますか？')">削除</button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </main>
      </div>
  </div>
</x-app-layout>
