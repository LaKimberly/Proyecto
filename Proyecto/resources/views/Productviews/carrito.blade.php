@extends('layouts.main', [ 'activePage' => 'menu', 'titlePage' => __('Productos')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-body">
                                <div class="row">
                                    {{-- @foreach ($products as $product) --}}
                                    <div class="item col-xs-4 col-lg-4 ">
                                        <div class="card" style="width: 15rem;">
                                            <img class="card-img-top" src="/storage/{{ $product->img }}"
                                                alt="Card image cap" class="avatar" width="500">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    Precio: $ {{ $product->productPrice }}<br>
                                                    Calificacion: {{ $product->productQualication }}
                                                </p>
                                            </div>
                                            {{-- <a href="{{ route('product.menu', $product->id) }}"
                                                    class="btn btn-warning"> <i class="material-icons">shopping_cart</i>
                                                </a> --}}
                                        </div>


                                    </div>
                                    {{-- @endforeach --}}
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- <div class="card-footer mr-auto">
                        {{ $products->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
