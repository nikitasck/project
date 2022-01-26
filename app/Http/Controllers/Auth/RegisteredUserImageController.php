<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageRequest;
use App\Models\Imgs;
use App\Models\UserImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register-user-image');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        $img = new Imgs;
        $usrImg = new UserImg();
        $validated = $request->validated();

        if($imgObj = $img->storeImage($validated['image'], 'public/image/users')){
            $usrImg->user_id = Auth::id();
            $usrImg->img_id = $imgObj->id;
            if($usrImg->save()) {
                return redirect('/register-adress-info');
            } else {
                $img->deleteImage($imgObj);
                $img->destroy($imgObj->id);
            }
        }

        return redirect('/register-adress-info');
    }
}
