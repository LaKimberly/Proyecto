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
                                @foreach ($products as $product)
                                <div class="item col-xs-4 col-lg-4 ">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="/storage/{{ $product->img }}" alt="Card image cap" class="avatar" width="500" height="200"><br>
                                        <h6 class="card-title col-sm-10">{{ $product->productName }}</h6>
                                        <p class="col-sm-6">${{ $product->productPrice }}</p>
                                        
                                        <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $product->productName }}" id="productName" name="productName">
                                        <input type="hidden" value="{{ $product->productPrice }}" id="productPrice" name="productPrice">
                                        <input type="hidden" value="{{ $product->ProductDescription }}" id="ProductDescription" name="ProductDescription">
                                        <input type="hidden" value="{{ $product->image }}" id="image" name="image">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-title col text-center">
                                            <button class="btn btn-danger btn-sm" class="tooltip-test" title="Agregar producto al carrito">
                                                <i class="fa fa-shopping-cart"></i> Agregar al carrito
                                            </button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer mr-auto">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection