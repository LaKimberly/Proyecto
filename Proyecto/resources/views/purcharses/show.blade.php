@extends('layouts.main', ['activePage' => 'purcharses', 'titlePage' => 'Detalles de la venta'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Venta</div>
                        <p class="card-category">Vista detallada de la venta {{ $products->productName }}</p>
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
                                                    <h5 class="title mx-3">{{ $product->productName }}</h5>
                                                </a>
                                                <p class="description">
                                                     ID: {{$product->id}} <br>
                                                     Precio: {{$product->productPrice}} <br>
                                                     Creado: {{$product->created_at}} <br>
                                                     Actualizado: {{$product->updated_at}} <br>
                                                </p>                                                
                                            </div>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="button-container">
                                            <a href="{{ route('purcharses.index')}}" class="btn btn-sm btn-success mr-3">Volver</a>
                                            <a href="{{ route('purcharses.edit', $product->id)}}" class="btn btn-sm btn-primary mr-3">Editar</a>                                       </div>
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