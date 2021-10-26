<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Categories;
use App\Models\Colors;
use App\Models\Imgs;
use App\Models\Product;
use App\Models\ProductColors;
use App\Models\ProductSizes;
use App\Models\ProductStorage;
use App\Models\Sizes;
use App\Models\Storage;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('created_at', 'ASC')->paginate(10);
        return view('admin.product.index',[
            'products' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::orderBy('category', 'asc')->get();
        $colors = Colors::orderBy('color', 'asc')->get();
        $sizes = Sizes::orderBy('size', 'asc')->get();
        $storage = Storage::orderBy('storage_size', 'asc')->get();
        return view('admin.product.create',[
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'storages' => $storage
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $success = false;
        DB::beginTransaction();
        try {
            $img = new Imgs();
            $product = new Product();

            if($img_id = $img->storeImage($request->file('image'), 'image')){
                $product->manufacture = $request->manufacture;
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->category_id = $request->category;
                $product->img_id = $img_id;

                if($product->save()){
                    if($colors = $request->colors){
                        foreach($colors as $color){
                            $colObj = Colors::find($color);
                            $product->colors()->save($colObj);
                        }
                    }
                    if($sizes = $request->sizes){
                        foreach($sizes as $size){
                            $sizeObj = Sizes::find($size);
                            $product->sizes()->save($sizeObj);
                        }
                    }
                    if($storages = $request->storages){
                        foreach($storages as $storage){
                            $storageObj = Storage::find($storage);
                            $product->storages()->save($storageObj);
                        }
                    }
                    $success = true;
                }
            }
        } catch (\Exception $e){
        }
        if($success){
            DB::commit();
            return redirect('/ap')->withSuccess('Product successfully added');
        } else {
            DB::rollBack();
            return redirect('/ap')->withErrorMessage('Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Categories::orderBy('category', 'asc')->get();
        $colors = Colors::orderBy('color', 'asc')->get();
        $sizes = Sizes::orderBy('size', 'asc')->get();
        $storage = Storage::orderBy('storage_size', 'asc')->get();
        return view('admin.product.edit',[
            'product' => $product,
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'storages' => $storage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $success = false;
        DB::beginTransaction();
        try {
            $img = new Imgs();

            $product->manufacture = $request->manufacture;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category;

            //Check for image input.
            if($request->has('image')){
                //Deleting old image first.
                if($img->deleteImage($product->img_id)){
                    if($img_id = $img->storeImage($request->file('image'), 'image')){
                        $product->img_id = $img_id;
                    }
                }
            }

            if($product->save()){
                if($colors = $request->colors){
                    $product->colors()->detach();
                    foreach($colors as $color){
                        $colObj = Colors::find($color);
                        $product->colors()->save($colObj);
                    }
                }
                if($sizes = $request->sizes){
                    $product->sizes()->detach();
                    foreach($sizes as $size){
                        $sizeObj = Sizes::find($size);
                        $product->sizes()->save($sizeObj);
                    }
                }
                if($storages = $request->storages){
                    $product->storages()->detach();
                    foreach($storages as $storage){                        
                        $storageObj = Storage::find($storage);
                        $product->storages()->save($storageObj);
                    }
                }
                
                $success = true;
            }

        } catch (\Exception $e){
        }
        if($success){
            DB::commit();
            return redirect('/ap')->withSuccess('Product successfully updated');
        } else {
            DB::rollBack();
            return redirect('/')->withErrorMessage('Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $img = Imgs::find($product->img_id);
        $product->colors()->detach();
        $product->sizes()->detach();
        $product->storages()->detach();
        if($product->delete()){
            $img->delete();
        }
        return redirect('/ap')->withSuccess('Product successfully deleted');
    }
}
