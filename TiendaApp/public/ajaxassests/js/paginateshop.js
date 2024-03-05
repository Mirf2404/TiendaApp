/* global bootstrap fetch */
(() => {
    let deleteCode = document.getElementById('deleteCode');
    let deleteName = document.getElementById('deleteName');
    let deleteUrl = document.getElementById('deleteUrl');
        const csrf = document.querySelector('meta[name="csrf-token"]')['content'];
    //let urlBase = 'https://carmelo.ieszaidinvergeles.es/laraveles/ajaxApp/public';
    const urlBase = document.querySelector('meta[name="url-base"]')['content'] + '/';

    let llamadaAjax = (url, procesarRespuesta) => {
        fetch(url, {
          method: 'GET',
          headers: {
            'Accept': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
            procesarRespuesta(data);
        })
        .catch(error => {
            console.log(error);
        });
    };
    


  let generarTextoProducto = (producto) => {
    return `
  <div class="product-layouts col-lg-4 col-md-4 col-sm-6" >
    <div class="product-thumb">
        <div class="image zoom">
            <a href="product-details.html" >
                <img src="images/${producto.img}" style="height:40em" alt="01">
            </a>
        </div>
        <div class="thumb-description">
            <div class="caption">
                <h4 class="product-title text-capitalize"><a href="product-details.html">${producto.Nombre}</a></h4>
            </div>
            <div class="rating">
                <div class="product-ratings d-inline-block align-middle">
                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                    <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                    <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                </div>
            </div>

            <div class="price">
                <div class="regular-price">${producto.Precio}</div>
                <div class="old-price">$150.00</div>
            </div>
            <div class="button-wrapper">
                <div class="button-group text-center">
                    <button type="button" id='btAddChart' dataset="${producto.Nombre}" datasetCode="${producto.Precio}" class="btn btn-primary btn-cart" data-target="#cart-pop"
                        data-toggle="modal" ><i class="material-icons">shopping_cart</i><span>Out
                            of stock</span></button>
                    <a href="wishlist.html" class="btn btn-primary btn-wishlist"><i
                            class="material-icons">favorite</i><span>wishlist</span></a>
                    <button type="button" class="btn btn-primary btn-compare"><i
                            class="material-icons">equalizer</i><span>Compare</span></button>
                    <button type="button" class="btn btn-primary btn-quickview" data-toggle="modal"
                        data-target="#product_view"><i class="material-icons">visibility</i><span>Quick
                            View</span></button>
                </div>
            </div>
        </div>
    </div>
       </div>
    `;
};

    let generarContenidoAjax = (data) => {
        let todo = '';
        data.productos.data.forEach(producto => {
            todo += generarTextoProducto(producto);
        });
        let contenidoAjax = document.getElementById('contenidoAjax');
   
        contenidoAjax.innerHTML = todo;
    };
    
let generarEnlacePagina = (link, index) => {
    if(index== 0){
       
         return ` 
    <li class="page-item"><a id="pagina-${index}" class="page-link"
      href="//">«</a>
    </li>`;
}
 if(link.label.startsWith("Next")){
     
         return ` 
    <li class="page-item"><a id="pagina-${index}" class="page-link"
      href="//">»</a>
    </li>`;
}   
  return ` 
    <li class="page-item"><a id="pagina-${index}" class="page-link"
      href="//">${link.label}</a>
    </li>`;
};

let agregarEventosPaginacion = (data) => {
  data.productos.links.forEach((link, index) => {
    let botonPagina = document.getElementById(`pagina-${index}`);
    botonPagina.addEventListener('click', function(event) {
      event.preventDefault(); // Evita que el enlace cambie de página
      shopProducto(link.url);
    });
  });
};

let generarPaginacionAjax = (data) => {
    let todo = '';
    data.productos.links.forEach((link, index) => {
        todo += generarEnlacePagina(link, index);
    });
    let paginacionAjax = document.getElementById('paginacionAjax');
    paginacionAjax.innerHTML = todo;
    agregarEventosPaginacion(data);
    agregarEventoAddChart();
   
};

    let shopProducto = (url) => {
        llamadaAjax(url, (data) => {
            document.getElementById('contenidoAjax').innerHTML = '';
            generarContenidoAjax(data);
            generarPaginacionAjax(data);
            
        });
    }

    document.addEventListener('DOMContentLoaded', function(event) {
      let url = urlBase + 'shop/producto?page=1';
      shopProducto(url);
       cargarCarrito(); 
        agregarEventoFiltrarTalla();
         document.getElementById('btBorrarPais').onclick = () =>{
        console.log("hola")
        peticionBorrarPais();
        cargarCarrito();
        
    };
    });
      

// Agrega el evento de búsqueda al botón de búsqueda
document.getElementById('searchButton').addEventListener('click', function() {
    searchProducts();
});

// Función para realizar la búsqueda de productos
function searchProducts() {
    let searchTerm = document.getElementById('myInput').value.trim(); // Obtener el término de búsqueda
    
    // Realizar la solicitud AJAX al servidor con el término de búsqueda
    if (searchTerm === '') {
       
        let url = urlBase + 'shop/producto';
        console.log(url) // Suponiendo que el endpoint sea '/productos' para obtener todos los productos
        llamadaAjax(url, (data) => {
            // Procesar los resultados obtenidos
            document.getElementById('contenidoAjax').innerHTML = ''; // Limpiar el contenido anterior
            generarContenidoAjax(data); // Mostrar los resultados
            generarPaginacionAjax(data); // Mostrar la paginación si es necesario
        });
    } else {
        // Si se proporciona un término de búsqueda, realizar la búsqueda según el término
        let url = urlBase + 'search/producto?nombre=' + encodeURIComponent(searchTerm); // Suponiendo que el endpoint sea '/search/producto'
        llamadaAjax(url, (data) => {
            // Procesar los resultados de la búsqueda
            document.getElementById('contenidoAjax').innerHTML = ''; // Limpiar el contenido anterior
            generarContenidoAjax(data); // Mostrar los resultados de la búsqueda
            generarPaginacionAjax(data); // Mostrar la paginación si es necesario
        });
    }
}

// Llama a la función para agregar el evento

let agregarEventoAddChart = () => {
    let addChartButtons = document.querySelectorAll('#btAddChart');
    addChartButtons.forEach(button => {
        button.addEventListener('click', () => {
            AddChart(button.getAttribute('dataset'), button.getAttribute('datasetCode'));
        });
    });
};
    let agregarEventoOneLess = () => {
    let addChartButtons = document.querySelectorAll('#oneLess');
    addChartButtons.forEach(button => {
        button.addEventListener('click', () => {
            
            Rest(button.getAttribute('data-name'), button.getAttribute('data-code'));
        });
    });
};
    let agregarEventoOneMore = () => {
    let addChartButtons = document.querySelectorAll('#oneMore');
    addChartButtons.forEach(button => {
        button.addEventListener('click', () => {
            
            AddChart(button.getAttribute('data-name'), button.getAttribute('data-code'));
        });
    });
};
    
    function cargarCarrito() {
    // Realiza una solicitud AJAX para obtener los datos del carrito
    fetch('https://mrufizq2404.ieszaidinvergeles.es/laraveles/TiendaApp/public/shop/chart', {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        let carritoElement = document.getElementById('modal-body');
    carritoElement.innerHTML = '';

    // Iterar sobre los elementos del carrito
    for (let pais in data) {
        let producto = data[pais];
        let nombre = producto[0].name;
         let code = producto[0].code;
        let precio = producto[0].code; // Supongamos que tienes una función para obtener el precio del producto
        let cantidad = producto[1];
console.log(cantidad)
        // Crear un elemento para mostrar el producto en el carrito
        let productoElement = document.createElement('div');
        productoElement.classList.add('feature', 'col');

        // Crear y agregar elementos para mostrar la información del producto
        let iconoElement = document.createElement('div');
        iconoElement.classList.add('feature-icon', 'd-inline-flex', 'align-items-center', 'justify-content-center', 'text-bg-primary', 'bg-gradient', 'fs-2', 'mb-3');
        iconoElement.innerHTML = `
            <svg class="bi" width="1em" height="1em">
                <use xlink:href="#collection"></use>
            </svg>`;
        productoElement.appendChild(iconoElement);

        let nombreElement = document.createElement('h3');
        nombreElement.classList.add('fs-2', 'text-body-emphasis');
        nombreElement.textContent = nombre+' '+cantidad;
        productoElement.appendChild(nombreElement);

        let precioElement = document.createElement('h4');
        precioElement.classList.add('fs-2', 'text-body-emphasis');
        precioElement.textContent = precio*cantidad + ' €';
        productoElement.appendChild(precioElement);

        let eliminarElement = document.createElement('a');
        eliminarElement.classList.add('icon-link');
        eliminarElement.href = '#';
        eliminarElement.innerHTML = `
            
            
      <h3>  <i id="oneLess" data-name="`+nombre+`" data-code="`+code+`" class="bi bi-caret-left"><</i>
            `+cantidad+`
         <i id="oneMore" data-name="`+nombre+`" data-code="`+code+`" class="bi bi-caret-right">></i></h3>`;
           
        productoElement.appendChild(eliminarElement);

        // Agregar el elemento del producto al carrito
        carritoElement.appendChild(productoElement);
     agregarEventoOneMore();
          agregarEventoOneLess();
    }
    })
    .catch(error => console.error("Error:", error));
}
    
function Rest(name, code) {
    let data = {
        name: name,
        code: code
    };

    fetch('https://mrufizq2404.ieszaidinvergeles.es/laraveles/TiendaApp/public/shop/rest/' + code, { // Utilizamos el helper url() para obtener la URL base
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf // Asegúrate de incluir el token CSRF si es necesario
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
         console.log("cargando carrito")
            cargarCarrito();
    })
    .catch(error => console.error("Error:", error));
}
    
    
    function AddChart(name,code) {
      let data = {
              code: code,
              name: name,
        };

console.log("Código del país a borrar:", data.name);
   

    // Realizar la petición DELETE
    fetch(('https://mrufizq2404.ieszaidinvergeles.es/laraveles/TiendaApp/public/shop/'+ data.name), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf
        },
        body: JSON.stringify(data) // Aquí se envían los datos JSON
    })
    .then(response => response.json())
    .then(data => {
      console.log("cargando carrito")
            cargarCarrito();
    })
    .catch(error => console.error("Error:", error));
    }
    
    
    
       var deletePaisModal = document.getElementById('deletePaisModal');
    console.log(deletePaisModal)
    deletePaisModal.addEventListener('shown.bs.modal', function (event) {
      console.table({
          dataset : event.relatedTarget.dataset.url,
          datasetCode : event.relatedTarget.dataset.code,
          
      });

    });
    
    function peticionBorrarPais() {

    // Realizar la petición DELETE
    fetch('https://mrufizq2404.ieszaidinvergeles.es/laraveles/TiendaApp/public/shop/AFG', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
           'X-CSRF-TOKEN': csrf
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.result > 0) {
            // Borrado exitoso, actualizar la interfaz o mostrar un mensaje
             var modalElem = document.querySelector('#deletePaisModal');
                var modalInstance = bootstrap.Modal.getInstance(modalElem);
                modalInstance.hide();
                var modalBody = document.getElementById('modal-body');
while (modalBody.firstChild) {
    modalBody.removeChild(modalBody.firstChild);
}
        } else {
            // El borrado no fue exitoso, mostrar un mensaje de error
            var errorAlert = document.getElementById('errorAlert');
            errorAlert.className = 'alert alert-danger';
        }
    })
    .catch(error => console.error("Error:", error));
}
let agregarEventoFiltrarTalla = () => {
    let addChartButtons = document.querySelectorAll('#checkboxSize');
    addChartButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (button.checked ||  button.tagName === 'A') {
                console.log(button.getAttribute('dataset'));
                FilterProducts(button.getAttribute('Category'),button.getAttribute('dataset'));

            } else {
                            FilterProducts('');
              
            }
        });
    });
};

/*------------------------Flitrado-----------------------------*/
function FilterProducts(filterType, filterValue) {
    let url;

    if (filterType === 'Talla') {
        // Construir la URL para filtrar por nombre
        url = urlBase + 'searchbytalla?Talla=' + encodeURIComponent(filterValue);
    } else if (filterType === 'Genero') {
        // Construir la URL para filtrar por precio
        url = urlBase + 'searchbytalla?Genero=' + encodeURIComponent(filterValue);
    } else {
        // Si no se especifica un tipo de filtro válido, realizar una búsqueda sin filtro
        url = urlBase + 'shop/producto';
    }
 console.log(url)
    // Realizar la solicitud AJAX al servidor con la URL construida
    fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Procesar los resultados de la búsqueda
        document.getElementById('contenidoAjax').innerHTML = ''; // Limpiar el contenido anterior
        generarContenidoAjax(data); // Mostrar los resultados de la búsqueda
        generarPaginacionAjax(data); // Mostrar la paginación si es necesario
    })
    .catch(error => console.error("Error:", error));
}
})();
