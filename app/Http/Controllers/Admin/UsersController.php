<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Mpdf\Tag\Q;

use function Laravel\Prompts\password;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function show(User $user,Request $request)
    {
              return view('admin.users.index');
     }
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:30',
            'phone' => 'required|numeric|unique:users|min:11',
            'email' => 'required|email|unique:users|min:3|max:1000',
            'user_subscribtion' => 'required|integer|min:1',
            'user_password' => 'required|min:3|max:30',
            'user_password_confirmation' => 'required|same:user_password',


        ]);
        $user = user::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subscribtion_id' => $request->user_subscribtion,
            'status' => 'active',
            'password' => Hash::make($request->user_password),

        ]);
        return redirect()->route('users.show', ['id' => $user->id])->with('success', 'User created successfully.');
    }

    /** Display the specified resource. */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        return view('admin.users.edit', ['id' => $user->id]);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {



        $request->validate([
            'first_name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:30',
            'phone' => 'required|numeric|min:11',
            'email' => 'required|email|min:3|max:1000',
            'user_subscribtion' => 'required|integer|min:1',

        ]);
        if ($request->user_password || $request->user_password_confirmation) {
            $request->validate([
                'user_password' => 'required|min:3|max:30',
                'user_password_confirmation' => 'required|same:user_password',

            ]);
        }
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subscribtion_id' => $request->user_subscribtion,

            'status' => 'active'
        ]);
        if ($request->user_password || $request->user_password_confirmation) {
            $user->update([
                'password' => Hash::make($request->user_password),

            ]);
        }

        return redirect()->route('users.show', $user->id)->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        $user->update([
            'status' => 'inactive',
        ]);
        return redirect()->route('users.show',  ['id' => $user->id])->with('success', 'User Deactivated Successfully');
    }
}
