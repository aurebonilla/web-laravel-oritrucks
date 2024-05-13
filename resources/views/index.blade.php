<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>OriTrucks</title>
    <link rel="stylesheet" href="fontawesome-5.5/css/all.min.css" />
    <link rel="stylesheet" href="slick/slick.css">
    <link rel="stylesheet" href="slick/slick-theme.css">
    <link rel="stylesheet" href="magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/tooplate-infinite-loop.css" />
<!--
Tooplate 2117 Infinite Loop
https://www.tooplate.com/view/2117-infinite-loop
-->

  </head>
  <body>    
    <!-- Hero section -->
    <section id="infinite" class="text-white tm-font-big tm-parallax">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-md tm-navbar" id="tmNav">              
        <div class="container">   
          <div class="tm-next">
              <a href="#infinite" class="navbar-brand">OriTrucks</a>
          </div>             
            
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars navbar-toggler-icon"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="#infinite">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="#whatwedo">¿Qué hacemos?</a>
              </li>
              <li class="nav-item">
                <a class="nav-link tm-nav-link" href="#testimonials">Testimonios</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="#gallery">Galería</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="#contact">Contacto</a>
              </li>      
              <li class="nav-item">
              <a class="nav-link tm-nav-link" href="#" onclick="window.location.href='{{ route('auth.login') }}'">Usuarios</a>
            </li>                 
            </ul>
          </div>        
        </div>
      </nav>
      
      <div class="text-center tm-hero-text-container">
        <div class="tm-hero-text-container-inner">
            <h2 class="tm-hero-title">OriTrucks</h2>
            <p class="tm-hero-subtitle">
              Más que una empresa, una familia
            </p>
        </div>        
      </div>

      <div class="tm-next tm-intro-next">
        <a href="#whatwedo" class="text-center tm-down-arrow-link">
          <i class="fas fa-2x fa-arrow-down tm-down-arrow"></i>
        </a>
      </div>      
    </section>

    <section id="whatwedo" class="tm-section-pad-top">
      
      <div class="container">

            <div class="row tm-content-box"><!-- first row -->
                <div class="col-lg-12 col-xl-12">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4 tm-section-title">¿Qué hacemos?</h2>
                        <p class="mb-4 tm-intro-text">
                          Bienvenido a OriTrucks: donde el transporte de mercancías se convierte en una experiencia familiar. Con un enfoque cálido y comprometido, nos dedicamos a cuidar tus envíos como si fueran nuestros propios productos. Nuestro equipo experimentado y nuestra flota moderna garantizan entregas seguras y puntuales. Únete a nuestra familia y descubre un servicio de transporte personalizado que impulsa tu negocio hacia el éxito.</p>
                    </div>
                </div>

            </div><!-- first row -->
            
            <div class="row tm-content-box"><!-- second row -->
        		<div class="col-lg-1">
                    <i class="far fa-3x fa-chart-bar text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4">Líderes del Mercado</h2>
                        <p class="mb-4 tm-intro-text">
                          En OriTrucks, somos líderes en transporte de mercancías. Confía en nosotros para tus envíos.</p>
                    </div>
                </div>
                
                <div class="col-lg-1">
                    <i class="far fa-3x fa-comment-alt text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4">Soporte Rápido</h2>
                        <p class="mb-4 tm-intro-text">
                        Estamos aquí para brindarte soporte rápido en tus envíos.</p>
                    </div>
                </div>

            </div><!-- second row -->
            
            <div class="row tm-content-box"><!-- third row -->
        		<div class="col-lg-1">
                    <i class="fas fa-3x fa-fingerprint text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4">Máxima Seguridad</h2>
                        <p class="mb-4 tm-intro-text">
                          La seguridad es nuestra prioridad. Con tecnología de vanguardia y protocolos rigurosos, garantizamos la máxima protección para tus envíos.">
                          
                          <div class="tm-continue">
                            <a href="#testimonials" class="tm-intro-text tm-btn-primary">Sabe más</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-1">
                    <i class="fas fa-3x fa-users text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                      <h2 class="tm-text-primary mb-4">Familia</h2>
                        <p class="mb-4 tm-intro-text">
                          Somos una empresa familiar comprometida contigo. Con un trato cercano y atención personalizada, te brindamos un servicio de transporte confiable y de calidad.
                          <div class="tm-continue">
                            <a href="#testimonials" class="tm-intro-text tm-btn-primary">Sabe más</a>
                        </div>
                    </div>
                </div>

            </div><!-- third row -->

        </div>
      
    </section>
    
    <section id="testimonials" class="tm-section-pad-top tm-parallax-2">      
      <div class="container tm-testimonials-content">
        <div class="row">
          <div class="col-lg-12 tm-content-box">
            <h2 class="text-white text-center mb-4 tm-section-title">Testimonios</h2>
            <p class="mx-auto tm-section-desc text-center">
                Nulla dictum sem non eros euismod, eu placerat tortor lobortis. Suspendisse id velit eu libero pellentesque interdum. Etiam quis congue eros.
              </p>
            <div class="mx-auto tm-gallery-container tm-gallery-container-2">
              <div class="tm-testimonials-carousel">
                <figure class="tm-testimonial-item">
                  <img src="img/mariopastor.png" alt="Image" class="img-fluid mx-auto">
                  <blockquote>This background image includes a semi-transparent overlay layer. This section also has a parallax image effect.</blockquote>
                  <figcaption>Mario Pastor (Entrenador Elda)</figcaption>
                </figure>

                <figure class="tm-testimonial-item">
                  <img src="img/arribas.png" alt="Image" class="img-fluid mx-auto">
                  <blockquote>Testimonial section comes with carousel items. You can use Infinite Loop HTML CSS template for your websites.</blockquote>
                  <figcaption>Javier Arribas (Profesor Kun-Fú)</figcaption>
                </figure>

                <figure class="tm-testimonial-item">
                  <img src="img/clement.png" alt="Image" class="img-fluid mx-auto">
                  <blockquote>Nulla finibus ligula nec tortor convallis tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus.</blockquote>
                  <figcaption>Javier Clement (Surfero)</figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tm-bg-overlay"></div>
    </section>
    
    <section id="gallery" class="tm-section-pad-top">
      <div class="container tm-container-gallery">
        <div class="row">
          <div class="text-center col-12">
              <h2 class="tm-text-primary tm-section-title mb-4">Galería</h2>
              <p class="mx-auto tm-section-desc">
                Aquí encontrarás un conjunto de imágenes de los diferentes vehículos de los que disponemos. Si quieres ver más, no dudes en visitar nuestras redes sociales.
              </p>
          </div>            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mx-auto tm-gallery-container">
                    <div class="grid tm-gallery">
                      <a href="img/furgoneta2.jpeg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/furgoneta2.jpeg" alt="Image 2" class="img-fluid">
                          <figcaption>
                            <h2><i>Furgoneta <span>Vieja 1</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/furgoneta3.jpeg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/furgoneta3.jpeg" alt="Image 3" class="img-fluid">
                          <figcaption>
                            <h2><i><span>Furgoneta </span> Vieja 2</i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/camioneta1.jpeg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/camioneta1.jpeg" alt="Image 4" class="img-fluid">
                          <figcaption>
                            <h2><i>Camioneta <span>Especial</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/camion1.jpeg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/camion1.jpeg" alt="Image 5" class="img-fluid">
                          <figcaption>
                            <h2><i><span>Camión</span> Grande</i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/camionete2.jpeg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/camionete2.jpeg" alt="Image 6" class="img-fluid">
                          <figcaption>
                            <h2><i>Camionete <span>Pequeño</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/furgo.jpeg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/furgo.jpeg" alt="Image 7" class="img-fluid">
                          <figcaption>
                            <h2><i>Furgoneta <span>Premium</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                    </div>
                </div>                
            </div>        
          </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="tm-section-pad-top tm-parallax-2">
    
      <div class="container tm-container-contact">
        
        <div class="row">
            
            <div class="text-center col-12">
                <h2 class="tm-section-title mb-4">Contáctanos</h2>
                <p class="mb-5">
                  Proin enim orci, tincidunt quis suscipit in, placerat nec est. Vestibulum posuere faucibus posuere. Quisque aliquam velit eget leo blandit egestas. Nulla id posuere felis, quis tristique nulla.
                </p><br>
            </div>
            
            <div class="col-sm-12 col-md-6">
              <form action="https://formspree.io/f/xqkrjbgg" method="post">
                <div id="sendmessage">Tu mensaje ha sido enviado</div>
                <div id="errormessage"></div>
                <input id="name" name="name" type="text" placeholder="Your Name" class="tm-input" required />
                <input id="email" name="email" type="email" placeholder="Your Email" class="tm-input" required />
                <textarea id="message" name="message" rows="8" placeholder="Message" class="tm-input" required></textarea>
                <button type="submit" class="btn tm-btn-submit">Enviar</button>
              </form>
            </div>
            
            <div class="col-sm-12 col-md-6">
                
                <div class="contact-item">
                  <a rel="nofollow" href="mailto:mail@company.com" class="item-link">
                      <i class="far fa-2x fa-envelope mr-4"></i>
                      <span class="mb-0">admin@oritrucks.me</span>
                  </a>              
                </div>
                
                <div class="contact-item">
                  <a rel="nofollow" href="https://www.google.com/maps" class="item-link">
                      <i class="fas fa-2x fa-map-marker-alt mr-4"></i>
                      <span class="mb-0">Nuestra Localización</span>
                  </a>              
                </div>
                
                <div class="contact-item">
                  <a rel="nofollow" href="tel:0100200340" class="item-link">
                      <i class="fas fa-2x fa-phone-square mr-4"></i>
                      <span class="mb-0">255-662-5566</span>
                  </a>              
                </div>
                
                <div class="contact-item">&nbsp;</div>
            
            </div>
            
            
        </div><!-- row ending -->
        
      </div>

      	<footer class="text-center small tm-footer">
          <p class="mb-0">
          Copyright &copy; 2020 OriTrucks by G01-01
        </footer>

    </section>
    
    <script src="js/jquery-1.9.1.min.js"></script>     
    <script src="slick/slick.min.js"></script>
    <script src="magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>     
    <script src="js/bootstrap.min.js"></script> 
    <script>

      function getOffSet(){
        var _offset = 450;
        var windowHeight = window.innerHeight;

        if(windowHeight > 500) {
          _offset = 400;
        } 
        if(windowHeight > 680) {
          _offset = 300
        }
        if(windowHeight > 830) {
          _offset = 210;
        }

        return _offset;
      }

      function setParallaxPosition($doc, multiplier, $object){
        var offset = getOffSet();
        var from_top = $doc.scrollTop(),
          bg_css = 'center ' +(multiplier * from_top - offset) + 'px';
        $object.css({"background-position" : bg_css });
      }

      // Parallax function
      // Adapted based on https://codepen.io/roborich/pen/wpAsm        
      var background_image_parallax = function($object, multiplier, forceSet){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        // $object.css({"background-attatchment" : "fixed"});

        if(forceSet) {
          setParallaxPosition($doc, multiplier, $object);
        } else {
          $(window).scroll(function(){          
            setParallaxPosition($doc, multiplier, $object);
          });
        }
      };

      var background_image_parallax_2 = function($object, multiplier){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        $object.css({"background-attachment" : "fixed"});
        
        $(window).scroll(function(){
          if($(window).width() > 768) {
            var firstTop = $object.offset().top,
                pos = $(window).scrollTop(),
                yPos = Math.round((multiplier * (firstTop - pos)) - 186);              

            var bg_css = 'center ' + yPos + 'px';

            $object.css({"background-position" : bg_css });
          } else {
            $object.css({"background-position" : "center" });
          }
        });
      };
      
      $(function(){
        // Hero Section - Background Parallax
        background_image_parallax($(".tm-parallax"), 0.30, false);
        background_image_parallax_2($("#contact"), 0.80);   
        background_image_parallax_2($("#testimonials"), 0.80);   
        
        // Handle window resize
        window.addEventListener('resize', function(){
          background_image_parallax($(".tm-parallax"), 0.30, true);
        }, true);

        // Detect window scroll and update navbar
        $(window).scroll(function(e){          
          if($(document).scrollTop() > 120) {
            $('.tm-navbar').addClass("scroll");
          } else {
            $('.tm-navbar').removeClass("scroll");
          }
        });
        
        // Close mobile menu after click 
        $('#tmNav a').on('click', function(){
          $('.navbar-collapse').removeClass('show'); 
        })

        // Scroll to corresponding section with animation
        $('#tmNav').singlePageNav({
          'easing': 'easeInOutExpo',
          'speed': 600
        });        
        
        // Add smooth scrolling to all links
        // https://www.w3schools.com/howto/howto_css_smooth_scroll.asp
        $("a").on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;

            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 600, 'easeInOutExpo', function(){
              window.location.hash = hash;
            });
          } // End if
        });

        // Pop up
        $('.tm-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          gallery: { enabled: true }
        });

        $('.tm-testimonials-carousel').slick({
          dots: true,
          prevArrow: false,
          nextArrow: false,
          infinite: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2
              }
            }, 
            {
              breakpoint: 480,
              settings: {
                  slidesToShow: 1
              }                 
            }
          ]
        });

        // Gallery
        $('.tm-gallery').slick({
          dots: true,
          infinite: false,
          slidesToShow: 5,
          slidesToScroll: 2,
          responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
        });
      });
    </script>
  </body>
</html>