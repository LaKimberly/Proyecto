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
                                        <input type="text" class="form-control" name="address" placeholder="Ingrese su dirección" required autofocus>
                                    </div>
                                    @if ($errors->has('address'))
                                    <div id="address-error" class="error text-danger pl-3" for="address" style="display: block;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="username" placeholder="Ingrese su nombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,48}" title="Los nombres no pueden contener números ni caracteres especiales" required autofocus>
                                    </div>
                                    @if ($errors->has('username'))
                                    <div id="username-error" class="error text-danger pl-3" for="username" style="display: block;">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Número de teléfono</label>
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control" name="phonenumber" placeholder="Ingrese su número de teléfono" pattern="(^(\+57)*(3)([0-2])([0-9])[0-9]{7}$)|(^(60)([1-8])[0-9]{7}$)" title="Un número de teléfono no puede contener espacios en blanco. Si es un número de teléfono celular es opcional escribir la extensión +57. Un número de telefono fijo debe contener la extensión 606" required autofocus>
                                    </div>
                                    @if ($errors->has('phonenumber'))
                                    <div id="phonenumber-error" class="error text-danger pl-3" for="phonenumber" style="display: block;">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email" placeholder="Ingrese su email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                    @endif
                                </div>                              
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Contraseña</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña" required autofocus>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
