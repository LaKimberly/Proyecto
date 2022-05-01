@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Roles'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Roles</h4>
                                <p class="card-category">Roles registrados</p>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success')}}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 text-right">
                                        @can('role_create')
                                        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-facebook">Añadir rol</a>
                                        @endcan
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Guard</th>
                                            <th>Fecha de creación</th>
                                            <th>Permisos</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($roles as $role)
                                            <tr>
                                                <td>{{ $role->id}}</td>
                                                <td>{{ $role->name}}</td>
                                                <td>{{ $role->guard_name}}</td>
                                                <td class="text-primary">{{ $role->created_at->toFormattedDateString() }}</td>
                                                <td>
                                                @forelse ($role->permissions as $permission)
                                                    <span class="badge badge-info">{{ $permission->name }}</span>
                                                @empty
                                                    <span class="badge badge-danger">Este rol no tiene permisos</span>
                                                @endforelse
                                                </td>
                                                <td class="td-actions text-right">
                                                    @can('role_edit')
                                                    <a href="{{ route('roles.edit', $role->id)}}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                    @endcan
                                                @can('role_destroy')
                                                <form action="{{ route('roles.destroy', $role->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar el rol de {{$role->name}}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form> 
                                                @endcan 
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2">Sin registros.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer mr-auto">
                                {{ $roles->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection