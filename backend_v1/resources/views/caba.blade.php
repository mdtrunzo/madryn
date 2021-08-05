<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CABA Premiate por sentir - Me emociona Madryn</title>
  <link rel="icon" href="img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/animations.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
  <header>
    <nav>
      <a href="https://meemocionamadryn.com.ar">
        <div class="logo">
          <img src="img/puerto-madryn-me-emociona-madryn-logo.png" alt="">
        </div>
      </a>
      <div class="menu">
        <ul>
          <a href="https://meemocionamadryn.com.ar">
            <li>INICIO</li>
          </a>
          <a href="https://meemocionamadryn.com.ar/experiencias-me-emociona-puerto-madryn/">
            <li>EXPERIENCIAS</li>
          </a>
          <a href="https://meemocionamadryn.com.ar/alojamiento-me-emociona-puerto-madryn/">
            <li>ALOJAMIENTO</li>
          </a>
          <a href="https://meemocionamadryn.com.ar/gastronomia-me-emociona-puerto-madryn/">
            <li>GASTRONOMÍA</li>
          </a>
        </ul>
      </div>
      <div class="menu-mobile">
        <i class="fas fa-bars navicon"></i>
      </div>
      <div class="full-width-menu">
        <i class="fas fa-times close"></i>
        <ul>
          <a href="https://meemocionamadryn.com.ar">
            <li>INICIO</li>
          </a>
          <a href="https://meemocionamadryn.com.ar/experiencias-me-emociona-puerto-madryn/">
            <li>EXPERIENCIAS</li>
          </a>
          <a href="https://meemocionamadryn.com.ar/alojamiento-me-emociona-puerto-madryn/">
            <li>ALOJAMIENTO</li>
          </a>
          <a href="https://meemocionamadryn.com.ar/gastronomia-me-emociona-puerto-madryn/">
            <li>GASTRONOMÍA</li>
          </a>
        </ul>
      </div>
    </nav>
  </header>

  <div class="slider">
    <video id="background-video" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
      <source src="img/puerto-madryn-ballenas-2.mp4" type="video/mp4">
    </video>
    <div class="slider-content">
      <h1>PREMIATE POR SENTIR</h1>
    </div>
    <div class="img-header">
      <img src="img/header-blanco.svg" alt="" class="header-blanco">
    </div>

  </div>
  <div class="faces">
    <img src="img/me-emociona-madryn-face-1.png" alt="" class="face1 animate-fade">
    <img src="img/me-emociona-madryn-face-2.png" alt="" class="face2 animate-fade2">
    <img src="img/me-emociona-madryn-face-4.png" alt="" class="face3 animate-fade3">
    <img src="img/me-emociona-madryn-face-3.png" alt="" class="face4 animate-fade4">
    <img src="img/puerto-madryn-destino-seguro.png" alt="" class="face5 animate-fade3">
  </div>
  <a href="#main">
    <div class="arrow-down">
      <img src="img/madryn-boton-scroll.png" alt="">
    </div>
  </a>
  <div class="main" id="main">
    <h3>COMPLETÁ EL FORMULARIO <br>Y GANÁ</h3>

    <form id="form">
      <div class="form-group">
        <input type="text" class="form-control values" id="name" placeholder="Nombre" name="name" required>
      </div>
      <div class="form-group">
        <input type="text" name="lastName" class="form-control values" id="lastName" placeholder="Apellido" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control values" id="email" aria-describedby="emailHelp"
          placeholder="Correo Electrónico" required>
          <span class="alert-msg">Ya tenés un cupón generado con este correo electrónico.</span>
      </div>
      <button class="button" id="submit">ENVIAR</button>
    </form>


  </div>

  <footer>
    <div class="social-icons">
      <a href="https://www.facebook.com/madryn.travel/" target="_blank"><i class="fab fa-facebook"></i></a>
      <a href="https://twitter.com/madryntravel" target="_blank"><i class="fab fa-twitter"></i></a>
      <a href="https://www.instagram.com/madryn.travel/" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://www.youtube.com/user/secturmadryn" target="_blank"><i class="fab fa-youtube"></i></a>
    </div>
    <div class="center-img">
      <img src="img/safa-travels-sin-fondo-WEB.png" alt="">
      <img src="img/logo-EnteMixto-vertical-blanco-1.png" alt="">
      <img src="img/compromiso-de-calidad-compromiso-de-calidad-turistica.png" alt="">
      <img src="img/Unesco.png" alt="">
      <img src="img/Logo-marca-pais.png" alt="">
      <img src="img/logo-gobierno-chubut.png" alt="">
      <img src="img/logo-municipalidad-puerto-madryn.png" alt="">
    </div>
    <div class="third-img">
      <img src="img/logo-puerto-madryn-naturaleza-sin-limites.png" alt="">
    </div>
  </footer>
  <script src="js/menu.js"></script>
  <script src="js/index.js"></script>
</body>

</html>