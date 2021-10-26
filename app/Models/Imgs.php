<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Imgs extends Model
{
    use HasFactory;

    //Saving image path in db and return row id. $file-file from request, $fileName - for storage()
    public function storeImage($file,$fileName)
    {
        $path = $file->store($fileName);
        $this->src = $path;
        $this->save();
        return $this->id;
    }

    //Delete image form storage directore. Can receiving path to the file filename from storage dir.
    public function deleteImage($imgId)
    {
        $img = Imgs::find($imgId);
        Storage::delete($img->src);
        $img->delete();
        return true;
    }
}
