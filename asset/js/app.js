
// Define una función para obtener el token de acceso
 const getAccesoClave = async () => {
    // Define los headers para la petición POST
    const headers = {
        "Content-Type": "application/x-www-form-urlencoded",
    }
    // Define los datos para la petición POST
    const data = {
        client_id: "",
        client_secret: "",
        grant_type: "client_credentials",
    }
    // Define las opciones para la petición POST
    const options = {
        method: "POST",
        headers,
        body: new URLSearchParams(data),
    }
    // Envia la petición POST para obtener el token de acceso
    try {
        const respuesta = await fetch("https://developers.syscom.mx/oauth/token", options);
        const json = await respuesta.json(); // Procesa la respuesta como JSON
        return json.access_token; // Devuelve el datos de acceso
    } catch (error) {
        console.error(error); // Maneja los errores
    }
}

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
    // Envia la petición GET para obtener las categorías
    try {
        const rescategorias = await fetch("https://developers.syscom.mx/api/v1/categorias", options)
        const categorias = await rescategorias.json();

        let htmlCategorias = '';

        categorias.forEach((categoria) => {
            let url = '';
            let img = '';
            switch (categoria.nombre) {
                case "Videovigilancia":
                    img = './asset/img/categorias/philidor-vigilancia.jpg';
                    url += "./pages/subcategorias/videovigilancia";
                    break;

                case "Radiocomunicación":
                    img = './asset/img/categorias/philidor-comunicacion.jpg';
                    url += "./pages/subcategorias/radiocomunicación";
                    break;

                case "Redes y Audio-Video":
                    img = './asset/img/categorias/philidor-redes.jpg';
                    url += "./pages/subcategorias/redes-audio";
                    break;

                case "IoT / GPS / Telemática y Señalización Audiovisual":
                    img = './asset/img/categorias/philidor-iot.jpg';
                    url += "./pages/subcategorias/iot-gps-telematica";
                    break;

                case "Energía":
                    img = './asset/img/categorias/philidor-energia.jpg';
                    url += "./pages/subcategorias/energia";
                    break;

                case "Automatización   e Intrusión":
                    img = './asset/img/categorias/philidor-automatizacion.jpg';
                    url += "./pages/subcategorias/automatizacion";
                    break;

                case "Control  de Acceso ":
                    img = './asset/img/categorias/philidor-acceso.jpg';
                    url += "./pages/subcategorias/control-acceso";
                    break;

                case "Detección  de Fuego":
                    img = './asset/img/categorias/philidor-deteccion.jpg';
                    url += "./pages/subcategorias/detencion-fuego";
                    break;

                case "Cableado Estructurado":
                    img = './asset/img/categorias/philidor-cableado.jpg';
                    url += "./pages/subcategorias/cableado-estructurado";
                    break;

                default:
                    url = "#";
            }

            htmlCategorias += `
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="${url}" class="d-block"> 
                                <img src="${img}" class="featured-block-image img-fluid" alt="">
                                <p class="featured-block-text"><strong>${categoria.nombre}</strong> </p>
                            </a>
                        </div>
                    </div>
                `;
            // console.log(categoria.nombre);
        });
        document.getElementById('categoria').innerHTML = htmlCategorias;

    } catch (error) {
        console.log(error);
    }

 

});

// // Obtenemos respuesta
// async function logAccesoDatos() {
//     const acceso = await getAccesoClave();
//     console.log(acceso);
// }
// logAccesoDatos(); //Mostramos 


