@extends('layouts.main', ['activePage' => 'Productos', 'titlePage' => __('Detalles del Producto')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Vista detallada del Producto {{$product->productName}} </h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body">    
                    @if(session('success'))
                        <div class="alert alert-success" role="success"> 
                            {{session('success')}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 col-md-center">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <div class="auto">
                                                <a href="#" class="d-flex">
                                                    <img src="" alt="image" class="avatar">
                                                    <h5 class="title mx-3"> {{$product->productName}} </h5> 
                                                </a>
                                                <p class="description">
                                                {{$product->productPrice}}<br>
                                                {{$product->ProductDescription}}<br>
                                                {{$product->productQualication}}<br>
                                                </p>
                                            </div>
                                        </p>
                                        <div class="card-description">
                                           // hola
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="button-containe">
                                              <a href="{{ route('product.index', $product->id) }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                                              <a href="{{ route('product.edit', $product->id) }}" class="btn-sm btn-primary mr-3 "> Editar </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection