<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $users = User::all();
        $users = User::paginate(10);
        return UserResource::collection($users);
        //return response()->json([
        //'success' => true,  // يوضح أن العملية تمت بنجاح
        //'message' => "Data is loaded successfully", // رسالة نجاح
        //'data' => UserResource::collection($users)
        // البيانات المسترجعة
  //  ], 200); // كود الاستجابة HTTP 200 (نجاح)

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return new UserResource($user);
//         return response()->json([
//         'success' => true,  // يوضح أن العملية تمت بنجاح
//         'message' => "Data is stored successfully", // رسالة نجاح
//         'data'=> $user,
//         //البيانات المسترجعة
//    ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
