<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageService as ImageService;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('image');
            if(!is_null($id)){ 
                $image = Image::findOrFail($id);
            }
            return $next($request);
        });
    } 

    public function index()
    {
        $images = DB::table('images')
        ->orderBy('updated_at', 'desc')
        ->paginate(20);

        return view('admin.images.index', 
        compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     * composer require intervention/image で"intervention/image": "^2.5"が必要
     */
    public function store(UploadImageRequest $request)
    {
        $imageFiles = $request->file('files');
        if(!is_null($imageFiles)){
            foreach($imageFiles as $imageFile){
                $fileNameToStore = ImageService::upload($imageFile, 'products');    
                Image::create([
                    'filename' => $fileNameToStore  
                ]);
            }
        }

        return redirect()
        ->route('admin.images.index')
        ->with(['message' => '画像登録を実施しました。',
        'status' => 'info']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('admin.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|max:50'
        ]);

        $image = Image::findOrFail($id);
        $image->title = $request->title;
        $image->save();

        return redirect()
        ->route('admin.images.index')
        ->with(['message' => '画像情報を更新しました。',
        'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // 【画像の削除処理】プロダクトで使用されている画像IDをチェックし、該当する場合は削除（nullをセット）
        
        $imageInProducts = Product::where('image1', $image->id)
        ->orWhere('image2', $image->id)
        ->orWhere('image3', $image->id)
        ->orWhere('image4', $image->id)
        ->get();

        if($imageInProducts){
            $imageInProducts->each(function($product) use($image){
                if($product->image1 === $image->id){
                    $product->image1 = null;
                    $product->save();
                }
                if($product->image2 === $image->id){
                    $product->image2 = null;
                    $product->save();
                }
                if($product->image3 === $image->id){
                    $product->image3 = null;
                    $product->save();
                }
                if($product->image4 === $image->id){
                    $product->image4 = null;
                    $product->save();
                }
            });
        }

        // 【処理終了】プロダクト内の該当画像を削除完了

        $filePath = 'public/products/' . $image->filename;

        if(Storage::exists($filePath)){
            Storage::delete($filePath);
        }

        Image::findOrFail($id)->delete(); 

        return redirect()
        ->route('admin.images.index')
        ->with(['message' => '画像を削除しました。',
        'status' => 'alert']);
    }
}
