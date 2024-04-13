<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;

class UserAddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    
    public function index()
    {
        return auth()->user()->addresses;
    }

    

    
    public function store(StoreUserAddressRequest $request)
    {
        
        UserAddress::create([
            "user_id" => auth()->user()->id,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "region" => $request->region,
            "district" => $request->district,
            "street" => $request->street,
            "home" => $request->home,
        ]);
        // auth()->user()->addresses()->create($request->toArray());
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function show(UserAddress $userAddress)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserAddressRequest  $request
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAddress $userAddress)
    {
        //
    }
}
