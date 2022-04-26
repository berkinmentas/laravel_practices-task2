<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Address;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $data=User::with('phones', 'addresses')->paginate();
//        dd($data);
//        return $data;
        return UserResource::collection($data);
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function store(Request $request)
    {
        //
        $phoneArray = $request->get('phones');
        $addressArray = $request->get('addresses');
        $user = User::create([
           'name'=>$request->name,
            'surname'=>$request->surname,
            'email'=>$request->email
        ]);
        if($phoneArray){
            foreach($phoneArray as $phone){
                Phone::create(array_merge($phone, ['user_id'=>$user->id]));
            }
        }
        if($addressArray){
            foreach($addressArray as $address){
                Address::create(array_merge($address, ['user_id'=>$user->id]));
            }
        }
        $data=User::with('phones', 'addresses')->paginate();
        return UserResource::collection($data);
//
//        Phone::create([
//            'phone_type'=>$request->phone_type,
//            'phone_number'=>$request->phone_number,
//            'user_id'=>$request->user_id
//        ]);
//        Address::create([
//            'title'=>$request->title,
//            'address'=>$request->address,
//            'district'=>$request->district,
//            'city'=>$request->city,
//            'postal_code'=>$request->postal_code,
//            'user_id'=>$request->user_id
//        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
