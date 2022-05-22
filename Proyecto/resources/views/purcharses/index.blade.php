@extends('layouts.main', ['activePage' => 'purcharses', 'titlePage' => 'Ventas'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Ventas</h4>
                                <p class="card-category">Ventas registradas</p>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success')}}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 text-right">
                                        @can('purcharse_create')
                                        <a href="{{ route('purcharses.create') }}" class="btn btn-sm btn-facebook">Agregar venta</a>
                                        @endcan
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Productos</th>
                                            <th>Precio</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($purcharses as $purcharse)
                                            <tr>
                                                <td>{{ $purcharse->id}}</td>
                                                <td class="text-primary">{{ $purcharse->created_at->format('M d Y - h:i:s') }}</td>
                                                <td>
                                                @forelse ($purcharse->products as $product)
                                                    <span class="badge badge-primary">{{ $product->productName }}</span>
                                                @empty
                                                    <span class="badge badge-danger">Esta venta no tiene productos</span>
                                                @endforelse
                                                </td>
                                                <td>{{ $purcharse->purcharsePrice}}</td>
                                                <td class="td-actions text-right">
                                                @can('purcharse_edit')
                                                    <a href="{{ route('purcharses.edit', $purcharse->id)}}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                @endcan
                                                @can('purcharse_destroy')
                                                <form action="{{ route('purcharses.destroy', $purcharse->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar esta venta?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form> 
                                                @endcan 
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2">Sin registros.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer mr-auto">
                                {{ $purcharses->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection