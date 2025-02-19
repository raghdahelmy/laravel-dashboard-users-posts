<?php

namespace App\Http\Controllers;

use App\Models\User;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\users\UserUpdate;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        // dd($users);
        return view("users.all", ['users' => $users]);
        //   return view('users.all' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.creat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($request->hasFile('image')) {
            $user->addMedia($request->file('image'))->toMediaCollection("users");
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    // public function show(string $id)
    {
        //
        // $user = User::with('post')->findOrFail($id);
        // dd($user);
        // $data = $user->load('post');
        // في طريقة تانيه اجيب بيها الكود واعمل بايند اني ادي للفانكشن شو 2 براميتر
        // اول واحد وهو المودل يوزر وتاني برامزوهو ال اي دي
        //  وممكن نبدل ال اي دي بالاسم الاصفر الي بين الكيرلي براكتس الي ف الروت ليست
        // $data = $user->with('post')->get();
        // dd($data);
        // ممكن ابدل الويز والجيت ب لوووووووود
        $data = $user->load('post');

        return view('users.ShowUsers', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        // $user = User::find($id);
        return view("users.EditUsers", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdate $request, User $user)
    {
        //
        $user->update([
            ' name' => $request->name,
            'email' => $request->email,
        ]);

        // $users = User::find($id);
        // $users->email = $request->email ;
        // $users->name = $request->name;
        // $users->save();
        session()->flash('message', 'Your User is updated');
        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //

        $user->delete();
        session()->flash('message', 'USER is deleted in trashed');
        //return redirect()->back();
        return to_route('users.index');
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->get();

        return view('users.trashed', compact('users'));
    }


    public function forceDelete($id)
    {
$user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        session()->flash('message', 'User permanently deleted');
        // return to_route('users.trashed');
        return redirect()->route('users.trashed');

    }

    public function restore($id)
    {

       $users = User::withTrashed()->find($id);
        $users->restore();
        session()->flash('message', 'User restored successfully.');

        return to_route('users.trashed');
    }
}
