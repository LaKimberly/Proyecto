@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Nuevo usuario'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('user.store') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Usuario</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Dirección</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="address" placeholder="Ingrese su dirección"  value="{{old('address')}}"autofocus>
                                    @if ($errors->has('address'))
                                    <span class="error text-danger" for="input-address">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="username" placeholder="Ingrese su nombre" value="{{old('username')}}"  title="Los nombres no pueden contener números ni caracteres especiales"  autofocus>
                                    @if ($errors->has('username'))
                                    <span class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Número de teléfono</label>
                                <div class="col-sm-7">
                                    <input type="tel" class="form-control" name="phonenumber" placeholder="Ingrese su número de teléfono" value="{{old('phonenumber')}}" title="Un número de teléfono no puede contener espacios en blanco. Si es un número de teléfono celular es opcional escribir la extensión +57. Un número de telefono fijo debe contener la extensión 606"  autofocus>
                                    @if ($errors->has('phonenumber'))
                                    <span class="error text-danger" for="input-phonenumber">{{ $errors->first('phonenumber') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" placeholder="Ingrese su email"  value="{{old('email')}}" autofocus>
                                    @if ($errors->has('email'))
                                    <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>                              
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña" autofocus>
                                    @if ($errors->has('password'))
                                    <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                            <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <table class="table">
                                                <tbody>
                                                    @foreach ($roles as $id => $role)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" name="roles[]"
                                                                        value="{{ $id }}"
                                                                    >
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $role }}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('user.index')}}" class="btn btn-primary btn-success mr-3">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
