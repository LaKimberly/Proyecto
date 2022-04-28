@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Detalles del permiso'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Permisos</div>
                        <p class="card-category">Vista detallada del permiso {{ $permission->name }}</p>
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
                                                    <h5 class="title mx-3">{{ $permission->name }}</h5>
                                                </a>
                                                <p class="description">
                                                     ID: {{$permission->id}} <br>
                                                     Tipo: {{$permission->guard_name}} <br>
                                                     Creado: {{$permission->created_at}} <br>
                                                     Actualizado: {{$permission->updated_at}} <br>
                                                </p>                                                
                                            </div>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="button-container">
                                            <a href="{{ route('permissions.index')}}" class="btn btn-sm btn-success mr-3">Volver</a>
                                            <a href="{{ route('permissions.edit', $permission->id)}}" class="btn btn-sm btn-primary mr-3">Editar</a>                                       </div>
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