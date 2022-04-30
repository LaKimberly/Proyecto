//no

@extends('layouts.main', [ 'activePage' =>  'Productos' ,    'titlePage' => __('Editar Productos')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action=" {{route('product.update', $product->id)}} " method="post" class="form-horizontal">
        @csrf
        @method('PUT')
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Productos</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <div class="row">
              <label for="name" class="col -sm-2 col-form-label">Nombre del Producto </label>
              <div class="col-sm-7">
              <input type="text" name="productName" class="form-control"  value="{{ $product-> productName }}" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{4,48}" title="El nombre de un producto debe contener entre 4 y 48 caracteres, no puede contener números ni caracteres especiales" required autocomplete="productName" autofocus>
              </div>
            </div>
            <div class="row">
              <label for="name" class="col -sm-2 col-form-label">Precio del Producto </label>
              <div class="col-sm-7">
              <input type="text" name="productPrice" class="form-control" value="{{ $product-> productPrice }}" pattern="([1-9])[0-9]{2,4}$" title="Ingrese un precio tal que 100 sea el mínimo" required autocomplete="productPrice" autofocus>
              </div>
            </div>
            <div class="row">
              <label for="name" class="col -sm-2 col-form-label">Descripcion del Producto </label>
              <div class="col-sm-7">
              <input type="text" name="ProductDescription"  maxlength="255" class="form-control"  value="{{ $product-> ProductDescription }}"  required autocomplete="ProductDescription" autofocus>
               </div>
            </div>
            <div class="row">
              <label for="name" class="col -sm-2 col-form-label">Calificacion del Producto </label>
              <div class="col-sm-7">
              <input type="text" name="productQualication" class="form-control" value="{{ $product-> productQualication }}"  pattern="[0-5]" title="Una calificación válida va de 0 a 5" required autocomplete="productQualication" autofocus>
              </div>
            </div>
          </div>
            <div class="card-footer ml-auto mr-auto">
            <a href="{{ route('product.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
              <button type="submit" class="btb btn-primary"> Actualizar</button>
            </div>

        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection