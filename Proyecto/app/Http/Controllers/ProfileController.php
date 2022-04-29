<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Rules\MatchOldPassword;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\PasswordEditRequest;

class ProfileController extends Controller
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
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
       $data = $request->only('address', 'username', 'email', 'phonenumber');
       $password=$request->input('password');
       if($password)
           $data['password'] = bcrypt($password);
       $user->update($data);
       return redirect()->route('profile.edit', $user)->with('success', 'Perfil actualizado correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required','min:4','max:30', new MatchOldPassword],
            'new_password' => ['required','min:4','max:30'],
            'new_confirm_password' => ['same:new_password','min:4','max:30'],
        ]);

        User::find(auth()->user()->id)->update(['password'=>Hash::make($request->new_password)]);
        return redirect()->back()->with('success', 'Su contraseña ha sih¿do actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
