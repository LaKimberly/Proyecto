@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Detalles del usuario'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Usuarios</div>
                        <p class="card-category">Vista detallada del usuario {{ $user->username }}</p>
                    </div>
                    <!--body-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                        <p class="card-text">
                                            <div class="author">
                                                <a href="#" class="d-flex">
                                                    <img src="{{ asset('/img/avatar.png') }}" alt="image" class="avatar">
                                                    <h5 class="title mx-3">{{ $user->username }}</h5>
                                                </a>
                                                <p class="description">
                                                     {{$user->address}} <br>
                                                     {{$user->phonenumber}} <br>
                                                     {{$user->email}} <br>
                                                        @forelse($user->roles as $role)
                                                            <span class="badge badge-info">{{ $role->name }}</span>
                                                        @empty
                                                            <span class="badge badge-danger">No roles</span>
                                                        @endforelse
                                                     <br>
                                                     Creado: {{$user->created_at}} <br>
                                                     Actualizado: {{$user->updated_at}} <br>
                                                </p>                                                
                                            </div>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="button-container">
                                            <a href="{{ route('user.index')}}" class="btn btn-sm btn-success mr-3">Volver</a>
                                            <a href="{{ route('user.edit', $user->id)}}" class="btn btn-sm btn-primary mr-3">Editar</a>                                       </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end card body-->
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection