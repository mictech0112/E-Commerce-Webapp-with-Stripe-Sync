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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <x-flash-message status="session('status')" />
                  <h1 class="text-2xl font-medium text-gray-800">画像管理</h1>  
                  <div class="flex justify-end mb-4">
                    <button onclick="location.href='{{ route('admin.images.create')}}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規画像登録</button>                        
                  </div> 
                  <div class="flex flex-wrap">
                  @foreach ($images as $image )
                      <div class="w-1/4 p-2 md:p-4">
                      <a href="{{ route('admin.images.edit', ['image' => $image->id ])}}">  
                      <div class="border rounded-md p-2 md:p-4">
                        <x-thumbnail :filename="$image->filename" type="products" />
                        <div class="text-gray-700">{{ $image->title }}</div>
                      </div>
                      </a>
                      </div>
                    @endforeach
                  </div>
                  {{ $images->links() }}
                </div>
            </div>
        </div>
    </div>
  </div>
</x-app-layout>
  