@extends('layouts.main', [ 'activePage' =>  'Productos' ,    'titlePage' => __('Registrar Productos')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action=" {{route('product.register')}} " method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Producto</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error )
                <li>{{ $error }} </li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="row">
              <label for="name" class="col -sm-2 col-form-label">Nombre del Producto </label>
              <div class="col-sm-7">
              <input type="text" name="productName" class="form-control" placeholder="{{ __('Nombre del Producto...') }}" value="{{ old('productName') }}" title="El nombre de un producto debe contener entre 4 y 48 caracteres, no puede contener números ni caracteres especiales" required autocomplete="productName" autofocus>
              </div>
            </div>
            <div class="row">
              <label for="name" class="col -sm-2 col-form-label">Precio del Producto </label>
              <div class="col-sm-7">
              <input type="text" name="productPrice" class="form-control" placeholder="{{ __('Precio del Producto...') }}" value="{{ old('productPrice') }}" title="Ingrese un precio tal que 100 sea el mínimo" required autocomplete="productPrice" autofocus>
              </div>
            </div>
            <div class="row">
              <label for="name" class="col -sm-2 col-form-label">Descripcion del Producto </label>
              <div class="col-sm-7">
              <input type="text" name="ProductDescription"  maxlength="255" class="form-control"  placeholder="{{ __('Descripcion del Producto...') }}" value="{{ old('ProductDescription') }}" required autocomplete="ProductDescription" autofocus>
               </div>
            </div>
            <div class="row">
              <label for="name" class="col -sm-2 col-form-label">Calificacion del Producto </label>
              <div class="col-sm-7">
              <input type="text" name="productQualication" class="form-control" placeholder="{{ __('Calificacion del Producto...') }}" value="{{ old('productQualication') }}" title="Una calificación válida va de 0 a 5" required autocomplete="productQualication" autofocus>
              </div>
            </div>
            <div class="row">
              <label for="imagenes" class="col -sm-2 col-form-label">Imagenes de los Productos</label>
              <div class="col-sm-7">
              <input type="file" id="imagenes" name="imagenes" class="form-control" accept="image/*">
              </div>
            </div>
          </div>
            <div class="card-footer ml-auto mr-auto">
            <a href="{{ route('product.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
              <button type="submit" class="btb btn-primary"> Guardar</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection