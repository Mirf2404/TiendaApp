<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Producto;
use App\Data\Chart;

class AdminController extends Controller {
    
public function index(Request $request)
{
    $column = $request->input('column', 'id'); // Columna por defecto para ordenar
    $order = $request->input('order', 'asc'); // Orden por defecto

    // Obtener productos paginados en lugar de todos los productos
    $productos = Producto::orderBy($column, $order)->paginate(10); // Cambia el número 10 por la cantidad deseada de productos por página

    if (session('verificado') != null) {
        return view('Admin.admin', ['productos' => $productos, 'column' => $column, 'order' => $order]);
    } else {
        return redirect('login');
    }
}



public function sort($column, $order)
{
    // Validar que la columna y el orden sean válidos
    $validColumns = ['id', 'Nombre', 'Precio','Genero','Talla'];
    $validOrders = ['asc', 'desc'];

    if (!in_array($column, $validColumns) || !in_array($order, $validOrders)) {
        return redirect()->route('admin.index');
    }

    return redirect()->route('admin.index', ['column' => $column, 'order' => $order]);
}

    
      public function create()
    {
    if (session('verificado') != null) {
           return view('Admin.create');
    } else {
        return redirect('login');
    }
      
    }

public function store(Request $request)
{
  
    $this->validate($request, [
        'Nombre' => 'required|max:255',
        'Precio' => 'required|numeric|max:255',
        'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        'Genero' => 'required|in:H,M', // Validación del género
        'Talla' => 'required|in:L,XS,S,XL', // Validación de la talla
    ]);

    try {
        $producto = new Producto();
        $producto->Nombre = $request->input('Nombre');
        $producto->Precio = $request->input('Precio');
        $producto->Genero = $request->input('Genero');
        $producto->Talla = $request->input('Talla');

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time().'.'.$image->getClientOriginalExtension();
           
            $image->move(public_path('images'), $imageName);
            
            $producto->img = $imageName;
        }

        $producto->save();

        return redirect('admin')->with(['message' => 'The product has been saved.']);
    } catch (\Exception $e) {
        return back()->withInput()->withErrors(['message' => 'The product has not been saved.']);
    }
}


     public function edit($code)
    { 
        $pais = Pais::find($code);
      return view('Admin.edit', ['producto' => $pais]);
    }

 public function update(Request $request, $id)
{
    $this->validate($request, [
        'Nombre' => 'required|max:255',
        'Precio' => 'required|numeric|max:255',
        'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:1000', // Validación de la imagen
        'Genero' => 'required|in:H,M', // Validación del género
        'Talla' => 'required|in:L,XS,S,XL', // Validación de la talla
    ]);

    try {
        $producto = Producto::find($id);
        $producto->Nombre = $request->input('Nombre');
        $producto->Precio = $request->input('Precio');
        $producto->Genero = $request->input('Genero');
        $producto->Talla = $request->input('Talla');

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $producto->img = $imageName;
        }

        $producto->save();
        return redirect('admin')->with(['message' => 'The game has been updated']);
    } catch (\Exception $e) {
        return back()->withInput()->withErrors(['message' => 'The game has not been updated']);
    }
}


    public function destroy($code)
    {
   $pais = Pais::find($code);
        try {
            $pais->delete();
            return redirect('admin')->with(['message' => 'The movie has been deleted.']);
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'The movie has not been deleted.']);
}
        
    }
    
}