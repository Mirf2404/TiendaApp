<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Producto;
use App\Data\Chart;

class ShopController extends Controller {
    
       function chart() {
       
       
        
         return response()->json(session('carrito')->get());

      
    }
    
    function producto() {
        $paises = Pais::orderBy('Nombre', 'asc')->paginate(6);
        return response()->json(['productos' => $paises]);
    }
public function search(Request $request) {
    $nombre = $request->input('nombre');

    // Verificar si se proporciona un término de búsqueda
    if ($nombre !== '') {
        // Realizar la búsqueda de productos por nombre
        $productos = Producto::where('Nombre', 'like', '%' . $nombre . '%')->paginate(6);
    } else {
        // Si no se proporciona un término de búsqueda, obtener todos los productos ordenados alfabéticamente
        $productos = Producto::orderBy('Nombre', 'asc')->paginate(6);
    }

    return response()->json(['productos' => $productos]);
}
public function searchbytalla(Request $request) {
    $nombre = $request->input('Talla');

    if($request->input('Talla') != null){
       $productos = Producto::where('Talla', 'like',  $nombre )->paginate(6);
    return response()->json(['productos' => $productos]); 
    }else{
           $nombre = $request->input('Genero');
         $productos = Producto::where('Genero', 'like',  $nombre )->paginate(6);
    return response()->json(['productos' => $productos]); 
    }
    
}

    function shop() {
        if(session('carrito') === [] ||  session('carrito') === null){
            Session::put('carrito', new Chart());
         
           
        }
                 return view('shop.shop');
     
     
        
    }
    
    
    
    
    
    
    
    function add($data){
         // Obtener los datos del cuerpo de la solicitud
       
    $requestData = json_decode(file_get_contents('php://input'), true);

    // Verificar si se recibieron los datos esperados
    if (isset($requestData['name']) && isset($requestData['code'])) {
        $name = $requestData['name'];
        $code = $requestData['code'];

        // Aquí puedes incluir la lógica para agregar el producto al carrito
        $producto = new Producto();
        $producto->code = $code;
        $producto->name =  $name;
        session('carrito')->add($producto);

        // Puedes enviar una respuesta al cliente si lo deseas
        echo json_encode(array('success' => true));
    } else {
        // Si faltan datos en la solicitud, devolver un error
        http_response_code(400); // Bad Request
        echo json_encode(array('error' => 'Missing required data'));
    }
    }


public function rest(Request $request, $code) {
    $data = $request->all(); 

   session('carrito')->substract($code);
    return response()->json(['message' => 'Datos recibidos correctamente'], 200);
}





public function destroy($code)
    {
       
     try {
         
         
        
        try {
        session('carrito')->emptyChart();
                                   $respuesta = [
                                    'result' => 1, 
                                    'message' => 'Pais Eliminado correctamente.',
                                    'paises' => Pais::all()
                                ];
        return response()->json($respuesta);
    } catch (\Exception $e) {
        // Loguea la excepción o devuelve un mensaje de error
        return response()->json(['result' => 0, 'error' => $e->getMessage()]);
    }
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'The pais has not been deleted.']);

            
        }
        
  
    }
}
