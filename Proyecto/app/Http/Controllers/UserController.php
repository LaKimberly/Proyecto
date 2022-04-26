<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request){
        // $request->validate([
        //     'address' => 'required|min:8|max:255',
        //     'username' => 'required|min:4',
        //     'phonenumber' => 'required|min:10|max:13|unique:users',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required',
        // ]);
        $user = User::create($request->only('address', 'email', 'username', 'phonenumber')
        + [
            'password' => bcrypt($request->input('passowrd')),
        ]);
        return redirect()->route('user.show', $user)->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function show(User $user){
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user){
        // $user=User::FindOrFail($id);
        $data = $request->only('address', 'username', 'email', 'phonenumber');
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        // if(trim($request->password)==''){
        //     $data=$request->except('password');
        // }else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }

        $user->update($data);
        return redirect()->route('user.show', $user)->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){
        $user->delete();
        return back()->with('success', 'Usuario eliminado correctamente');
    }
}
