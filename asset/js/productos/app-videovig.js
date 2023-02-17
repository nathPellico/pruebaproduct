
var accesoClave = window.getAccesoClave;

// Llama a la función para obtener el token de acceso
getAccesoClave().then(async (token) => {
    // Define los headers para la petición GET
    const headers = {
        Authorization: `Bearer ${token}`,
    }
    // Define las opciones para la petición GET
    const options = {
        method: "GET",
        headers,
    }
    

    // --------------------------------------------------------------------------------------
    // videovigilancia- Productos 22, 25, 26, 27, 30, 32, 37, 38, 65811
    // --------------------------------------------------------------------------------------
    const categoryId = 22;
    const pageSize = 10;
    let currentPage = 1;

    const getData = (apiURL, options) => {
        return fetch(apiURL, options)
            .then((response) => response.json())
            .then((json) => {
                console.log(json);
                renderPagination(json.paginas);
                renderProductos(json.productos);
            })
            .catch((error) => {
                console.error("Error: ", error);
            });
    };

    const renderPagination = (totalPages) => {
        let html = '<nav aria-label="Page navigation example">';
        html += '<ul class="pagination">';

        if (currentPage > 1) {
            html += `<li class="page-item">
                    <a class="page-link" data-page="${currentPage - 1}" href="#">Anterior</a>
                  </li>`;
        }

        let start = (Math.floor((currentPage - 1) / 10) * 10) + 1;
        let end = Math.min(start + 9, totalPages);

        for (let i = start; i <= end; i++) {
            html += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" data-page="${i}" href="#">${i}</a>
                  </li>`;
        }

        if (currentPage < totalPages) {
            html += `<li class="page-item">
                    <a class="page-link" data-page="${currentPage + 1}" href="#">Siguiente</a>
                  </li>`;
        }

        html += '</ul>';
        html += '</nav>';

        document.getElementById("pagination").innerHTML = html;

        const links = document.querySelectorAll("#pagination a");
        links.forEach((link) => {
            link.addEventListener("click", (event) => {
                event.preventDefault();
                currentPage = parseInt(event.target.dataset.page);
                const ApiProductos = `https://developers.syscom.mx/api/v1/productos?categoria=${categoryId}&pagina=${currentPage}&tamanio=${pageSize}`;
                getData(ApiProductos, options);
            });
        });

        links.forEach((link) => {
            link.addEventListener("click", (event) => {
                event.preventDefault();
                currentPage = parseInt(event.target.dataset.page);
                const ApiProductos = `https://developers.syscom.mx/api/v1/productos?categoria=${categoryId}&pagina=${currentPage}&tamanio=${pageSize}`;
                getData(ApiProductos, options);
            });
        });
    };

    // 26% iva + utilidad
    const cubrimiento = 0.20;
    const tasa = 19.02;
    const utilidad = 0.90;
    const iva = 0.16;
    const totaltasa = tasa + cubrimiento;

    

    // Variables iniciales
    let shoppingCartArray = [];
    let total = 0;
    let productContainer = document.querySelector('.infoProductos');
    let totalElement = document.querySelector('.cart-total-price');

   
    const renderProductos = (productos) => {
   
    // Imprimir productos en pantalla
    productos.forEach((product) => {

    const precios = product.precios;
    
    const precio_sin_iva = precios.precio_descuento * totaltasa / utilidad;
    const precio_descuento = precio_sin_iva * (1 + iva);

    // const modifiedUrl = product.link_privado.replace("/syscom/", "/mx/");

        productContainer.innerHTML += `
        <div class="col-6 col-md-4 col-lg-3 mb-4 mb-lg-0" id="${product.producto_id}">
            <div class="custom-block-wrap">
                <img src="${product.img_portada}" class="custom-block-image img-fluid" alt="">
                <div class="custom-block">
                    <div class="custom-block-body">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="${product.titulo}"><h5 class="mb-3" style="font-size: 0.9rem !important;"> ${product.titulo.substring(0, 25)}... </h5></span>
                    <p style="font-size: 0.7rem !important;">PM${product.modelo}</p>
                    <p style="font-size: 0.7rem !important;">${product.marca.substring(0, 13)}...</p> 
                    <p style="font-size: 0.7rem !important;">Existencia: ${product.total_existencia} </p>
                    <h6>$MXN ${precio_descuento.toFixed(2)} </h6>
                    </div>
                    <button class="custom-btn btn shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
        </div>
        `
        // Escucho cuando se hace click en un boton ADD
        let addBtns = document.querySelectorAll('.shop-item-button');
        addBtns = [...addBtns];
        
        let cartContainer = document.querySelector('.cart-items');


        addBtns.forEach( btn => {
            

            btn.addEventListener('click', event=>{
                
                // console.log('click');
                // AGREGAR PRODUCTOS AL CARRO
        
               
                // Busar el ID del Producto
                let actualID = parseInt(event.target.parentNode.parentNode.parentNode.id);
                console.log(actualID);

                // Con el ID encontrar el objeto actual
                let actualProduct = productos.find(item => item.producto_id == actualID)

                if (actualProduct.quantity === undefined) {
                    actualProduct.quantity = 1;
                }
              
                // console.log(actualProduct.producto_id);

                // Preguntar si el producto que estoy agregando ya exite 
                
                let exite = false
                shoppingCartArray.forEach(prod => {
                    if (actualID == prod.producto_id) {
                    // if (actualID == prod.id) {
                        // prod.quantity++
                        exite = true
                    }
                    // console.log(prod.producto_id)
                })
                if(exite) {
                    // console.log('aumentado')
                    actualProduct.quantity++
                }else {
                    shoppingCartArray.push(actualProduct)
                }

            

                const precios = actualProduct.precios;
                const precio_sin_iva = precios.precio_descuento * totaltasa / utilidad;

                actualProduct.precio_descuento = precio_sin_iva * (1 + iva);

                console.log(shoppingCartArray)

                
                
                // Dibujaar en el DOM el arreglo de compras actualizado
                drawItems(); //Dibujar articulos

                // Actualiza el valor total
                getTotal();
                // total = getTotal();
                updateNumberOfItems();

                removeItems();
                
                // const shoppingCartJSON = JSON.stringify(shoppingCartArray);
                // console.log(shoppingCartJSON);

                  // Enviar el carrito actualizado al servidor
                 sendShoppingCart(shoppingCartArray);
            });
            
        });

        function sendShoppingCart(shoppingCartArray) {
            const shoppingCartJSON = JSON.stringify(shoppingCartArray);
            const xhttp = new XMLHttpRequest();
          
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText); // muestra la respuesta recibida del archivo PHP
              }
            };
          
            xhttp.open("POST", "../../pages/subcategorias/videovigilancia.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("shoppingCart=" + shoppingCartJSON);
          }
        

        function getTotal() {
            let sumTotal
            let total = shoppingCartArray.reduce((sum, item) => {
                sumTotal = sum + item.quantity*item.precio_descuento.toFixed(2)
                return sumTotal
            }, 0);
          
            totalElement.innerText = `$${total}`
            
            // enviarTotal(total);
        }
        
        // funcion dibujar articulos
        function drawItems() {
            cartContainer.innerHTML = '';
            shoppingCartArray.forEach(item => {
                cartContainer.innerHTML += `
                    <div class="cart-row">
                        <div class="cart-item cart-column">
                            <img class="cart-item-image" src="${item.img_portada}" width="100" height="100">
                            <span class="cart-item-title">${item.titulo}</span>
                        </div>
                        <span class="cart-price cart-column">$MXN ${item.precio_descuento.toFixed(2)}</span>
                        <div class="cart-quantity cart-column">
                            <input class="cart-quantity-input" min="1" type="number" value="${item.quantity}">
                            <button class="btn btn-danger" type="button">REMOVE</button>
                        </div>
                    </div>`       
            });
             removeItems();
            
        }
       

        function updateNumberOfItems() {
             let inputNumber = document.querySelectorAll('.cart-quantity-input');
             inputNumber = [...inputNumber];
 
             inputNumber.forEach(item => {
                item.addEventListener('click', event=> {
                    // conseguir el titulo del producto 
                   let actualProductTitle = event.target.parentElement.parentElement.childNodes[1].innerText
                    let actualProductQuantity = parseInt(event.target.value);
                    console.log(actualProductQuantity);

                   // buscar el objeto con ese titulo 
                    let actualProductObject = shoppingCartArray.find(item => item.titulo == actualProductTitle)
                    console.log(actualProductObject)
                   
                   // actualizar el numero de la quantity
                    actualProductObject.quantity = actualProductQuantity;
                
                   // Actualizar el precio total 
                   getTotal();
                    // console.log("hizo un click")
                    sendShoppingCart(shoppingCartArray);
             });
           
        });
        }

        function removeItems() {
           let removeBtns = document.querySelectorAll('.btn-danger');
           removeBtns = [...removeBtns];
           removeBtns.forEach(btn => {
            btn.addEventListener('click', event=> {
                  // Conseguir el titulo del libro
                   let actualProductTitle = event.target.parentElement.parentElement.childNodes[1].innerText;

                    // Busco el objeto con ese titulo
                   let actualProductObject = shoppingCartArray.find(item => item.titulo == actualProductTitle)
                    
                    // Remover el arreglo de productos de cart
                    shoppingCartArray = shoppingCartArray.filter(item => item != actualProductObject)
                    console.log(shoppingCartArray);
                    // Actualizar el precio total
                    drawItems();
                    getTotal();
                    updateNumberOfItems();
              
                    sendShoppingCart(shoppingCartArray);
            });
           });
        }  

        

        // function enviarTotal(total) {
        //     const xhttp = new XMLHttpRequest();

        //     xhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             const respuesta = JSON.parse(this.responseText);
        //             document.getElementById("resultado").innerHTML = respuesta; // muestra la respuesta recibida del archivo PHP
        //         }
        //       };
              
        //     xhttp.open("POST", "../../pages/subcategorias/videovigilancia.php", true);
        //     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //     xhttp.send("total=" + total);
        //   }
          

                       
        // console.log(product);   
                
        });

        

        // document.getElementById("infoProductos").innerHTML = html;
    };


    const ApiProductos = `https://developers.syscom.mx/api/v1/productos?categoria=${categoryId}&pagina=${currentPage}&tamanio=${pageSize}`;
    getData(ApiProductos, options);

 
});

