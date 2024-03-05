@extends('Admin.base')
@section('title', 'Argo Create Game')
@section('contenido')
<div class="theiaStickySidebar" style="text-align: center;">
    <div class="card-header">
        <strong class="card-title">Custom Table</strong>

    </div>



    <div class="table-stats order-table ov-h">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#        <a
                            href="{{ route('sort', ['column' => 'id', 'order' => ($column == 'id' && $order == 'asc') ? 'desc' : 'asc']) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5" />
                            </svg></a></th>
                    <th scope="col">Productos<a
                            href="{{ route('sort', ['column' => 'Nombre', 'order' => ($column == 'Nombre' && $order == 'asc') ? 'desc' : 'asc']) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5" />
                            </svg></a></th>
                    <th scope="col">Precio
                        <a
                            href="{{ route('sort', ['column' => 'Precio', 'order' => ($column == 'Precio' && $order == 'asc') ? 'desc' : 'asc']) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5" />
                            </svg></a>
                    </th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Genero
                           <a
                            href="{{ route('sort', ['column' => 'Genero', 'order' => ($column == 'Genero' && $order == 'asc') ? 'desc' : 'asc']) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5" />
                            </svg></a></th>
                    <th scope="col">Talla
                           <a
                            href="{{ route('sort', ['column' => 'Talla', 'order' => ($column == 'Talla' && $order == 'asc') ? 'desc' : 'asc']) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5" />
                            </svg></a></th>
                      <th scope="col">  <div class="pagination-wrapper" style="height: 5em; width: fit-content; float:right;">
   
        <ul aria-label="Page navigation example" class="pagination" id="paginacionAjax">
            {{ $productos->onEachSide(1)->links('vendor.pagination.custom') }}
        </ul>
  
</div>
</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
               
                <tr>
                    <td>{{ $producto->id }} </td>
                    <td>{{ $producto->Nombre }}</td>
                    <td>{{ $producto->Precio }}€</td>
                     
                    <td><img src="{{ asset('images/' . $producto->img) }}" alt="Producto" style="max-width: 100px;">
                    </td>  
                    <td>{{ $producto->Genero }}</td>
                    <td>{{ $producto->Talla }}</td>
                    <td>
                        <a href="{{ url('admin/' . $producto->id . '/edit')}}" class="btn btn-success"><i
                                class="fa fa-magic"></i>Edit</a>
                        <form class="formDelete" action="{{ url('admin/' . $producto->id) }}" method="post"
                            style="display: inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn-danger btn" type="submit">Delete</button>
                        </form>
                    </td>
                  
                </tr>
                @endforeach
                
            </tbody>
        </table>
       <nav>
          	<div class="pagination-wrapper float-left w-100">
						<p>Showing 1 to 9 of 11 (2 Pages)</p>
						<nav aria-label="Page navigation example">
							<ul aria-label="Page navigation example"  class="pagination" id="paginacionAjax">
			                  {{ $productos->onEachSide(1)->links('vendor.pagination.custom') }}
							</ul>
						</nav>
					</div>
 
          
        </nav>

        <a class="btn-primary btn" href="{{ url('admin/create') }}"><i class="fa fa-plus"></i>Link to create</a>
        <a href="{{ url('login/') }}" class="btn btn-primary">Back</a>
    </div> <!-- /.table-stats -->
</div>



@endsection