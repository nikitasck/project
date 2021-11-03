<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Categories;
use App\Models\Colors;
use App\Models\Imgs;
use App\Models\Product;
use App\Models\Sizes;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with(['image', 'colors', 'sizes', 'storages'])->filter($request)->orderBy('created_at', 'ASC')->paginate(4);
        $categories = Categories::orderBy('category', 'ASC')->get();
        $colors = Colors::orderBy('color', 'ASC')->get();
        $storage = Storage::orderBy('storage_size', 'ASC')->get();
        $sizes = Sizes::orderBy('size', 'ASC')->get();

        return view('product.products',[
            'products' => $products,
            'categories' => $categories,
            'colors' => $colors,
            'storages' => $storage,
            'sizes' => $sizes,
            'choosenCategory' => $request->category,
            'choosenColors' => $request->colors,
            'choosenSizes' => $request->sizes,
            'choosenStorages' => $request->storages
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

            $img = new Imgs();
            $product = new Product();

            if($imgObj = $img->storeImage($request->file('image'), 'public/image')){
                $product->manufacture = $request->manufacture;
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->category_id = $request->category;

                if($product->save()){
                    $product->image()->save($imgObj);
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
            return redirect('/ap')->withSuccess('Product successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        //$image = $product->images()->get();
        $image = $product->image->first()->src;

        return view('product.product',[
            'product' => $product,
            'image' => $image
        ]);
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
                    if($img_id = $img->storeImage($request->file('image'), 'public/image')){
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
        $product->colors()->detach();
        $product->sizes()->detach();
        $product->storages()->detach();
        $product->image()->detach();
        if($product->delete()){
            $img = $product->image();
            $img->deleteImage($img);
        }
        return redirect('/ap')->withSuccess('Product successfully deleted');
    }
}
