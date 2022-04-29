@extends('layouts.main', ['activePage' => 'profile', 'titlePage' => __('Perfil de usuario')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.update', auth()->user()->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar perfil') }}</h4>
                <p class="card-category">{{ __('Información del perfil') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Dirección') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('Dirección') }}" value="{{ old('address', auth()->user()->address) }}" />
                      @if ($errors->has('address'))
                        <span id="address-error" class="error text-danger" for="input-address">{{ $errors->first('address') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="input-username" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('username', auth()->user()->username) }}"/>
                      @if ($errors->has('username'))
                        <span id="username-error" class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Número de teléfono') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('phonenumber') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber" id="input-phonenumber" type="text" placeholder="{{ __('Número de teléfono') }}" value="{{ old('phonenumber', auth()->user()->phonenumber) }}" />
                      @if ($errors->has('phonenumber'))
                        <span id="phonenumber-error" class="error text-danger" for="input-phonenumber">{{ $errors->first('phonenumber') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}"/>
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Guardar cambios') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.update_password', auth()->user()->id) }}" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Cambia la contraseña') }}</h4>
                <p class="card-category">{{ __('Contraseña') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Contraseña actual') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('current_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" input type="password" name="current_password" id="input-current-password" placeholder="{{ __('Contraseña actual') }}" value=""/>
                      @if ($errors->has('current_password'))
                        <span id="current_password-error" class="error text-danger" for="input-current_password">{{ $errors->first('current_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-new_password">{{ __('Nueva contraseña') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('new_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" id="input-new_password" type="password" placeholder="{{ __('Nueva contraseña') }}" value=""/>
                      @if ($errors->has('new_password'))
                        <span id="new_password-error" class="error text-danger" for="input-new_password">{{ $errors->first('new_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-new_confirm_password">{{ __('Confirmar Nueva contraseña') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="new_confirm_password" id="input-new_confirm_password" type="password" placeholder="{{ __('Confirmar Nueva contraseña') }}" value=""/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Cambiar constraseña') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection