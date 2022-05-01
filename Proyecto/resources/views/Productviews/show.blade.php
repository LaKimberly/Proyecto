@extends('layouts.main', ['activePage' => 'Productos', 'titlePage' => __('Detalles del Producto')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Vista detallada del Producto {{ $product->productName }} </h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                {{-- <div class="col-md-6 col-md-center"> --}}
                                    <div class="item col-xs-6 col-lg-6">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="auto">
                                                <img src="/storage/{{ $product->img }}" alt="image"
                                                        class="avatar" width="200">
                                                <a href="#" class="d-flex">
                                                    <h5 class="title mx-5"> {{ $product->productName }} </h5>
                                                </a>
                                                <p class="description">
                                                    Precio: $ {{ $product->productPrice }}<br>
                                                    Descripcion: {{ $product->ProductDescription }}<br>
                                                    Calificacion: {{ $product->productQualication }}<br>
                                                </p>
                                            </div>
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-containe">
                                                <a href="{{ route('product.index', $product->id) }}"
                                                    class="btn btn-sm btn-success mr-3"> Volver </a>
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="btn-sm btn-primary mr-3 "> Editar </a>

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
