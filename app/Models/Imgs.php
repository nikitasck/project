<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Imgs extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->belongsToMany(Product::class, 'product_image', 'product_id', 'image_id')->withTimestamps();
    }

    //Saving image path in db and return row id. $file-file from request, $fileName - for storage()
    public function storeImage($file,$storageDir)
    {
        $path = $file->store($storageDir);
        $this->src = $path;
        $this->save();
        return $this;
    }

    //Delete image form storage directore. Can receiving path to the file filename from storage dir.
    public function deleteImage($img)
    {
        Storage::delete($img->src);
        $img->delete();
        return true;
    }
}
