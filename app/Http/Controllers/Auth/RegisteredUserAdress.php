<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdressRequest;
use App\Models\Adress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserAdress extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register-adress-info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdressRequest $request)
    {
        $adress = new Adress;
        $user = User::find(Auth::id());

        if($validated = $request->validated()){
            $user->adress()->save(
                new Adress([
                    'country' => $validated['country'],
                    'city' => $validated['city'],
                    'street' => $validated['street'],
                    'house_number' => $validated['house_number'],
                ])
                );
            return redirect('/')->with('succes', 'Welcome to our shop)');
        } else {

        }

    }
}
