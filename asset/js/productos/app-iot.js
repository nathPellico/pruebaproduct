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
    // IoT / GPS / Telemática y Señalización Audiovisual - Productos - 27
    // --------------------------------------------------------------------------------------
    const categoryId = 27;
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
                const ApiProductos = `https://developers.syscom.mx/api/v1/productos?categoria=${categoryId25}&pagina=${currentPage}&tamanio=${pageSize}`;
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
 
     const renderProductos = (productos) => {
     let html = "";
 
     productos.forEach((product) => {
         const precios = product.precios;
     
         const precio_sin_iva = precios.precio_descuento * totaltasa / utilidad;
         const precio_descuento = precio_sin_iva * (1 + iva);
         
             const modifiedUrl = product.link_privado.replace("/syscom/", "/mx/");
             const message = encodeURIComponent(`Hola, estoy interesado en hacer una compra. 
             ¿Podría proporcionar más información sobre el producto y cómo realizar la compra? 
             Gracias."Titulo: ${product.titulo} - PM${product.modelo} - $MXN ${precio_descuento.toFixed(2)}"  - ${modifiedUrl}`);
             html += '<div class="col-6 col-md-4 col-lg-3 mb-4 mb-lg-0">';
             html += '<div class="custom-block-wrap">';
             html += `<img src="${product.img_portada}" class="custom-block-image img-fluid" alt="">`;
             html += '<div class="custom-block">';
             html += '<div class="custom-block-body">';
             html += `<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="${product.titulo}"><h5 class="mb-3" style="font-size: 0.9rem !important;">${product.titulo.substring(0, 25)}... </h5></span>`;
             html += `<p style="font-size: 0.7rem !important;">PM${product.modelo}</p>`;
             html += `<p style="font-size: 0.7rem !important;">${product.marca.substring(0, 13)}...</p>`; //iva inclui
             html += `<p style="font-size: 0.7rem !important;">Existencia: ${product.total_existencia}</p>`;
             html += `<h6>$MXN ${precio_descuento.toFixed(2)}</h6>`;
             html += '</div>';
             html += `<a href="https://api.whatsapp.com/send?phone=5212211279827&text=${message}" target="_blank" class="custom-btn btn">Comprar</a>`;
             html += '</div>';
             html += '</div>';
             html += '</div>';
         });
         
 
         document.getElementById("infoProductos").innerHTML = html;
     };

    const ApiProductos = `https://developers.syscom.mx/api/v1/productos?categoria=${categoryId}&pagina=${currentPage}&tamanio=${pageSize}`;
    getData(ApiProductos, options);

 
});


