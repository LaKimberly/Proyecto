@extends('layouts.main', [ 'activePage' => 'Productos', 'titlePage' => __('Productos')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Productos Registrados</h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success" role="success"> 
                            {{session('success')}}
                        </div>
                        @endif
                        <div class="table-responsive">
                        <div class="row">
                            <div class="col-12 text-light ">
                                <a href="{{route('product.create')}}" class="btn btn-facebook">Añadir Producto</a>
                            </div>
                        </div>
                            <table class="table">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>PRECIO</th>
                                    <th class="text-rigth">ACCIONES</th>
                                </thead>
                                <tbody>
                                   @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product-> id }}</td>
                                        <td>{{$product-> productName }}</td>
                                        <td>{{$product-> productPrice }}</td>
                                        <td class="td-actions text-centered"> 
                                               <a href="{{ route('product.show', $product->id) }}" class="btn btn-info"> <i class="material-icons">person</i> </a>
                                               <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning"> <i class="material-icons">edit</i> </a>
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Esta seguro que desea Eliminar este producto')">
                                                 @csrf
                                                  @method('DELETE')
                                                 <button class=" btn btn-danger" type="submit" rel="tooltip">
                                                 <i class="material-icons">close</i>
                                                 </button>   
                                             </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                            
                        </div>
                        
                    </div>
                    
                    <div class="card-footer mr-auto">
                        {{ $products->links()}}    
                       
          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection