@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Usuarios'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Usuarios</h4>
                                    <p class="card-category">Usuarios registrados</p>
                                </div>
                                <div class="card-body">
                                    @if(session('success'))
                                    <div class="alert alert-success" role="success">
                                        {{ session('success')}}
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-facebook">Añadir usuario</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Dirección</th>
                                                <th>Teléfono</th>
                                                <th>Email</th>
                                                <th>Roles</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id}}</td>
                                                    <td>{{ $user->username}}</td>
                                                    <td>{{ $user->address}}</td>
                                                    <td>{{ $user->phonenumber}}</td>
                                                    <td>{{ $user->email}}</td>
                                                    <td>
                                                        @forelse($user->roles as $role)
                                                            <span class="badge badge-info">{{ $role->name }}</span>
                                                        @empty
                                                            <span class="badge badge-danger">No roles</span>
                                                        @endforelse
                                                    </td>
                                                    <td class="td-actions text-right">
                                                    <a href="{{ route('user.show', $user->id)}}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                    <a href="{{ route('user.edit', $user->id)}}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                    <form action="{{ route('user.delete', $user->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar a {{$user->username}}?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </form>  
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer mr-auto">
                                    {{ $users->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection