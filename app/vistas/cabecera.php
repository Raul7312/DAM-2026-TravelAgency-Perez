<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paso Noroeste - Proyecto Final</title>
        <link rel="stylesheet" href="../assets/estilosPag.css">
        <link rel="icon" type="image/png" href="../assets/img/miniLogo.png">
    </head>
    <body>


        <header class="header">

            <div class="nombre">

                <div class="zona-logo">
                    <a href="../public/index.php">
                        <img src="../assets/img/logillo.png" alt="Logo" style="height: 50px;"> 
                    </a>
                </div>

                <div class="zona-titulo">
                    <h1>Green Trip</h1>
                </div>

                <div class="zona-contacto">

                    <div class="dato-contacto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                        <span>+34 91 123 45 67</span>
                    </div>

                    <div class="dato-contacto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <span>soporte@greentrip.com</span>
                    </div>

                </div>
            </div>

            <nav>
                <ul class="indice">
                    <li><a href="../public/index.php">Home</a></li>

                    <?php if (isset($_SESSION["acceso"]) && $_SESSION["acceso"] === true): ?>
                        <li><a href="../admin/administrar_viajes.php">Modificar viajes</a></li>
                    <?php endif; ?>


                    <li class="dropdown">
                        <a href="#">Viajes ▾</a>
                        <ul class="submenu">
                            <li><a href="#">Forma de viaje</a></li>
                            <li><a href="#">Turismo sostenible</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#">Estilo ▾</a>
                        <ul class="submenu">
                            <li><a href="#">Forma de viaje</a></li>
                            <li><a href="#">Turismo sostenible</a></li>
                            <li><a href="#">Viaje mochilero</a></li>
                            <li><a href="#">Viaje en grupo</a></li>
                            <li><a href="#">Viaje solo</a></li>
                            <li><a href="#">Decálogo</a></li>
                            <li><a href="#">¿Quiénes somos?</a></li>
                            <li><a href="#">¿Dónde estamos?</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#">Viajar ▾</a>
                        <ul class="submenu">
                            <li><a href="#">Preguntas Frecuentes</a></li>
                            <li><a href="#">Dificultad, Precio, Presupuesto</a></li>
                            <li><a href="#">Descuentos</a></li>
                        </ul>
                    </li>

                    <li><a href="#">El coordinador</a></li>

                    <li class="dropdown">
                        <a href="#">Viajera ▾</a>
                        <ul class="submenu">
                            <li><a href="#">Mi PasoNW</a></li>
                            <li><a href="#">Newsletter</a></li>
                            <li><a href="#">Foros</a></li>
                            <li><a href="#">Blog de viaje</a></li>
                        </ul>
                    </li>
                    <?php if (isset($_SESSION["acceso"]) && $_SESSION["acceso"] === true): ?>

                        <li>
                            <a href="../admin/logout.php"">
                                Cerrar Sesión (<?php echo $_SESSION["username"]; ?>)
                            </a>
                        </li>

                    <?php else: ?>

                        <li>
                            <a href="../admin/login.php">
                                Acceder administrador
                            </a>
                        </li>

                    <?php endif; ?>

                </ul>
            </nav>

        </header>