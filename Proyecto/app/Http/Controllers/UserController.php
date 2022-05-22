<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        abort_if(Gate::denies('user_index'), 403);
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create', compact('roles'));
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
        // // ]);
        // $user = User::create($request->only('address', 'email', 'username', 'phonenumber')
        // + [
        //     'password' => bcrypt($request->input('passowrd')),
        // ]);
        $data=request()->validate([
            'address' => ['required', 'string'],
            'username' => ['required', 'string'],
            'phonenumber' => ['required', 'string', 'min:10','max:13', 'unique:users'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'max:30'],
        ]);

        $user = User::create([
            'address' => $data['address'],
            'username' => $data['username'],
            'phonenumber' => $data['phonenumber'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('user.show', $user)->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function show(User $user){
        
        abort_if(Gate::denies('user_show'), 403);
        $user->load('roles');
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user){
        
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user){
        $data = $request->only('address', 'username', 'email', 'phonenumber');
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        $user->update($data);
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('user.index', $user)->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){
        
        abort_if(Gate::denies('user_destroy'), 403);
        if(auth()->user()->id == $user->id){
            return redirect()->route('product.menu');
        }
        $user->delete();
        return back()->with('success', 'Usuario eliminado correctamente');
    }
}
