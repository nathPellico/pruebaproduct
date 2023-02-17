<!DOCTYPE html>
<html lang="en">
 <!-- include_once('./pages/consulta.php')  -->
<?php include_once('./includes/head.php') ?>


<title>Philidor-Categorias</title>

<body id="section_1">
    <?php require_once('./includes/nabvar.php') ?>
    <main>

        <section class="hero-section hero-section-full-height">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12 col-12 p-0">
                        <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://tienda.philidor.mx/wp-content/uploads/2020/09/CAMARA-IP-EXTERIOR-CON-LED-DE-ALERTA-PM-S2012.png" class="carousel-image img-fluid" alt="...">

                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>Cámara Exterior</h1>

                                        <p>Vigilando tu hogar, protegiendo lo que más importa.</p>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="https://ftp3.syscom.mx/usuarios/gmagos/HIK/IP/IPC/Solar/imagenes%20/a-easy-power-solution-with-a-solar-panel-and-a-battery.jpg" class="carousel-image img-fluid" alt="...">

                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>Cámara Solar</h1>

                                        <p>Protege tu hogar con la fuerza del sol."</p>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="https://tienda.philidor.mx/wp-content/uploads/2020/09/TIMBRE-DE-VIDEO-INTELIGENTE-WI-FI-PM-S1041-2.png" class="carousel-image img-fluid" alt="...">

                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>Timbre Wifi</h1>

                                        <p>Todas las funciones integradas en un solo dispositivo </p>
                                    </div>
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Categorias -->
        <section class="section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 text-center mx-auto">
                        <h2 class="mb-5">CATEGORÍAS</h2>
                    </div>

                    <div id="categoria" class="row">

                    </div>
                </div>
            </div>
        </section>
        <section class="contact-section section-padding" id="contacto">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                        <div class="contact-info-wrap">
                            <h2>Póngase en contacto</h2>

                            <div class="contact-image-wrap d-flex flex-wrap">
                                <img src="./asset/img/philidor-jaz1.jpg" class="img-fluid avatar-image" alt="">

                                <div class="d-flex flex-column justify-content-center ms-3">
                                    <p class="mb-0">Jazmín Lepe T</p>
                                    <p class="mb-0"><strong>Administrative Sales</strong></p>
                                </div>
                            </div>

                            <div class="contact-info">
                                <h5 class="mb-3">Información de contacto</h5>

                                <p class="d-flex mb-2">
                                    <i class="bi-geo-alt me-2"></i>
                                    C. 24 Pte. 3301, 72070 Puebla, Puebla
                                </p>

                                <p class="d-flex mb-2">
                                    <i class="bi-telephone me-2"></i>

                                    <a href="tel: 222-438-7232">
                                        222-438-7232
                                    </a>
                                </p>

                                <p class="d-flex">
                                    <i class="bi-envelope me-2"></i>

                                    <a href="mailto:ventas@philidormexico.com">
                                        ventas@philidormexico.com
                                    </a>
                                </p>

                                <!-- <a href="#" class="custom-btn btn mt-3">Get Direction</a> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12 mx-auto">
                        <form class="custom-form contact-form" method="post" role="form" >
                            <h2>Contacto</h2>
                            <p class="mb-4">También puede enviar un correo electrónico a:
                                <a href="mailto:nathanael.pellico@philidormexico.com">nathanael.pellico@philidormexico.com</a>
                            </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="text" name="first-name" id="first-name" class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Apellido" required>
                                </div>
                            </div>
                            <input type="tel" name="tel" id="tel" pattern="[0-9]{10,10}" class="form-control" placeholder="Telefono" required>
                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Correo" required>
                            <textarea name="message" rows="5" class="form-control" id="message" placeholder="En qué podemos ayudarle?" required></textarea>
                            
                            <button type="submit" class="form-control" >Enviar</button>
                        </form>
                        <script>
                            document.querySelector('form').addEventListener('submit', function(e) {
                                var inputs = document.querySelectorAll('input, textarea');
                                for (var i = 0; i < inputs.length; i++) {
                                    if (!inputs[i].value) {
                                        e.preventDefault();
                                        alert('Por favor, complete todos los campos');
                                        break;
                                    }
                                }
                            });
                        </script>
                    </div>

                </div>
            </div>
        </section>

        <?php require_once('./includes/footer.php') ?>


        <?php include_once('./includes/mainjs.php') ?>
</body>

</html>