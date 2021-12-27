<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use App\Models\DeliveryInformation;
use Illuminate\Http\Request;

class DeliveryInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryInformation  $deliveryInformation
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryInformation $deliveryInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryInformation  $deliveryInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryInformation $deliveryInformation)
    {

        return view('profile.deliveryInformation.edit',[
            'fuck' => DeliveryInformation::with(['user', 'delivery', 'adress'])->where('id', $deliveryInformation->first()->id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryInformation  $deliveryInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryInformation $deliveryInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryInformation  $deliveryInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryInformation $deliveryInformation)
    {
        //
    }
}
