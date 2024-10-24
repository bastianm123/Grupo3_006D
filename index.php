<?php
include ('../Veterinaria/app/config.php');
include ('../Veterinaria/admin/layout/mensaje.php');

session_start();
$email_sesion = "";

if(isset($_SESSION['sesion_email'])){
//echo "ha pasado por el login";
    $email_sesion = $_SESSION['sesion_email'];
    $sql = "SELECT * FROM usuarios WHERE email = '$email_sesion' ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id_usuario_sesion = $usuario['id'];
        $cargo_sesion = $usuario['cargo'];
    }
}else{
//echo "no ha pasado por el login";
//header('Location: '.$URL.'/login');
}
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Jquery Min JS -->
    <script src="<?php echo $URL;?>/public/js/jquery.min.js"></script>
    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/bootstrap.min.css">
    <!-- Owl Theme Default Min CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/owl.theme.default.min.css">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/owl.carousel.min.css">
    <!-- Boxicons Min CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/boxicons.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/flaticon.css">
    <!-- Meanmenu Min CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/meanmenu.min.css">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/animate.min.css">
    <!-- Nice Select Min CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/nice-select.min.css">
    <!-- Odometer Min CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/odometer.min.css">
    <!-- Date Picker CSS-->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/date-picker.min.css">
    <!-- Magnific Popup Min CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/magnific-popup.min.css">
    <!-- Beautiful Fonts CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/beautiful-fonts.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/style.css">
    <!-- Dark CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/dark.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/responsive.css">
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo $URL; ?>/public/img/favicon.png">

    <!-- TITLE -->
    <title>PetMania</title>
</head>

<body>
    
    <!-- Start Ecorik Navbar Area -->
    <div class="eorik-nav-style fixed-top">
        <div class="navbar-area">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="<?php echo $URL; ?>" class="logo">
                    <img src="<?php echo $URL; ?>/public/img/mobile-manu-logo.png" alt="Logo">
                </a>
            </div>
            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="container">
                        <a class="navbar-brand" href="">
                            <img src="<?php echo $URL; ?>/public/img/home-one/logo.png" alt="Logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="" class="nav-link active">
                                        Servicios
                                        
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="" class="nav-link ">
                                        Tienda
                                        
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class="nav-link ">
                                        Contactanos
                                        
                                    </a>
                                </li>
                                <?php
                                if($email_sesion == ""){ 
                                    //echo "Sin logear";
                                    ?>
                                    <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        Ingresar
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?php echo $URL ?>/login" class="nav-link">Iniciar Sesion</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo $URL ?>/login/registro.php" class="nav-link">Registrarse</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                                } else{
                                    //echo "Ya paso login";
                                    ?>
                                    <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <?php echo $email_sesion ?>
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?php echo $URL ; ?>/app/controllers/login/cerrar_sesion.php" class="nav-link">Cerrar Sesion</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                                }
                                ?>
                                
                            </ul>
                            <!-- Start Other Option -->
                            <div class="others-option">
                                <a class="call-us" href="tel:+009-8765-4332">
                                    <i class="bx bx-phone-call bx-tada"></i>
                                    +009 8765 4332
                                </a>
                            </div>
                            <!-- End Other Option -->
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Ecorik Navbar Area -->

    <!-- Start Sidebar Modal -->
    <div class="sidebar-modal">
        <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="bx bx-x"></i>
                            </span>
                        </button>
                        <h2 class="modal-title" id="myModalLabel2">
                            <a href="">
                                <img src="<?php echo $URL; ?>/public/img/home-one/logo.jpg" alt="Logo">
                            </a>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="sidebar-modal-widget">
                            <h3 class="title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, asperiores doloribus eum laboriosam praesentium delectus unde magni aut perspiciatis cumque deserunt dolore voluptate, autem pariatur? Dicta pariatur.</p>
                        </div>
                        <div class="sidebar-modal-widget">
                            <h3 class="title">Additional Links</h3>
                            <ul>
                                <li>
                                    <a href="log-in.html">Log In</a>
                                </li>
                                <li>
                                    <a href="sign-up.html">Sign Up</a>
                                </li>
                                <li>
                                    <a href="faq.html">FAQ</a>
                                </li>
                                <li>
                                    <a href="#">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-modal-widget">
                            <h3 class="title">Contact Info</h3>
                            <ul class="contact-info">
                                <li>
                                    <i class="bx bx-location-plus"></i>
                                    Address
                                    <span>New York - 1060, Str. First 78 Great Western Road</span>
                                </li>
                                <li>
                                    <i class="bx bx-envelope"></i>
                                    Email
                                    <span>hello@prevoz.com</span>
                                </li>
                                <li>
                                    <i class="bx bxs-phone-call"></i>
                                    Phone
                                    <span>+502-464-679, +265-497-466</span>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-modal-widget">
                            <h3 class="title">Connect With Us</h3>
                            <ul class="social-list">
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-linkedin'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-youtube'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Modal -->

    </body>

</html>
<!-- Start Ecorik Slider Area -->
<section class="eorik-slider-area">
    <div class="eorik-slider owl-carousel owl-theme">
        <div class="eorik-slider-item slider-item-bg-1">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="eorik-slider-text overflow-hidden one eorik-slider-text-one">
                            <h1>Lo mejor para tu mascota!</h1>
                            <span>Solicita ahora una cita para tu mascota.</span>
                            <div class="slider-btn">
                                <a class="default-btn" href="<?php echo $URL; ?>/reservar.php">
                                    Reservar
                                    <i class="flaticon-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="eorik-slider-item slider-item-bg-2">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="eorik-slider-text overflow-hidden two eorik-slider-text-one">
                            <h1>Productos de primera calidad</h1>
                            <span>Descubre lo ultimo en produtos para tu mascota.</span>
                            <div class="slider-btn">
                                <a class="default-btn" href="#">
                                    Ir a tienda
                                    <i class="flaticon-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="eorik-slider-item slider-item-bg-3">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="eorik-slider-text overflow-hidden three eorik-slider-text-one">
                            <h1>Contactanos</h1>
                            <span>Descubre quienes somos</span>
                            <div class="slider-btn">
                                <a class="default-btn" href="#">
                                    Conocenos
                                    <i class="flaticon-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="white-shape">
        <img src="<?php echo $URL;?>/public/img/home-one/slider/white-shape.png" alt="Image">
    </div>
    <div class="social-link">
        <ul>
            <li>
                <a href="#">
                    <i class="bx bxl-facebook"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxl-twitter"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxl-linkedin"></i>
                </a>
            </li>
        </ul>
    </div>
</section>
<!-- End Ecorik Slider Area -->

<!-- Start Check Area -->

<!-- End Check Section -->

<!-- Start Explore Area -->
<section class="explore-area pt-170 pb-100">
    <div class="container">
        <div class="section-title">
            <span>Explorar</span>
            <h2>Todo lo que tenemos para tu mascota</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="explore-img">
                    <img src="<?php echo $URL;?>/public/img/explore-img.png" alt="Image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="explore-content ml-30">
                    <h2>As much as comfort want to get from us everything</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eveniet reprehenderit ratione ad perspiciatis repudiandae iste ipsam temporibus sit quo! Incidunt, necessitatibus fugiat ut dignissimos pariatur odit natus ipsum! Obcaecati iste ipsam temporibus sit quo! Incidunt, necessitatibus Obcaecati iste ipsam temporibus Lorem ipsum dolor sit amet consectetur.</p>

                    <p>Konin wansis dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut nim ad minim veniam, quis nostrud exercitation. dolor sit amet, consectetur adipisicing quis nostrud exercitation Lorem ipsum dolor sit amet consectetur.</p>
                    <a href="about.html" class="default-btn">
                        Explorar mas
                        <i class="flaticon-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Explore Area -->

<!-- End Facilities Area -->
<section class="facilities-area pb-60">
    <div class="container">
        <div class="section-title">
            <span>Lore sas pper</span>
            <h2>Konin wansis dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-facilities-wrap">
                    <div class="single-facilities">
                        <i class="facilities-icon flaticon-pickup"></i>
                        <h3>Konin wansis dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt​</h3>
                        <p>parkn ipsum dolor sit amet, consectetur adiing elit sed do eiu</p>
                        <a href="service-details.html" class="icon-btn">
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-facilities-wrap">
                    <div class="single-facilities">
                        <i class="facilities-icon flaticon-coffee-cup"></i>
                        <h3>olor sit amet, consectetur adiing elit sed do​​​​</h3>
                        <p>parkn ipsum dolor sit amet, consectetur adiing elit sed do eiu</p>
                        <a href="service-details.html" class="icon-btn">
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-facilities-wrap">
                    <div class="single-facilities">
                        <i class="facilities-icon flaticon-garage"></i>
                        <h3>​Espacios</h3>
                        <p>parkn ipsum dolor sit amet, consectetur adiing elit sed do eiu</p>
                        <a href="service-details.html" class="icon-btn">
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-facilities-wrap">
                    <div class="single-facilities">
                        <i class="facilities-icon flaticon-water"></i>
                        <h3>Resenas y mas​</h3>
                        <p>parkn ipsum dolor sit amet, consectetur adiing elit sed do eiu</p>
                        <a href="service-details.html" class="icon-btn">
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Facilities Area -->

<!-- End Incredible Area -->
<section class="incredible-area ptb-140 jarallax">
    <div class="container">
        <div class="incredible-content">
            <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="video-btn popup-youtube">
                <i class="flaticon-play-button"></i>
            </a>
            <h2><span>Mascotas</span> consectetur adiing elit sed do</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores sed obcaecati, magni excepturi, temporibus vero, inventore tenetur assumenda natus sequi labore. Voluptates eligendi dolores quod temporibus aperiam adipisci, quasi reprehenderit. Voluptates eligendi dolores quod temporibus.</p>
            <a href="#" class="default-btn">
                Unete
                <i class="flaticon-right"></i>
            </a>
        </div>
    </div>
    <div class="white-shape">
        <img src="<?php echo $URL; ?>/public/img/shape/white-shape-top.png" alt="Image">
        <img src="<?php echo $URL; ?>/public/img/shape/white-shape-bottom.png" alt="Image">
    </div>
</section>
<!-- End Incredible Area -->

<!-- Start Our Rooms Area -->
<section class="our-rooms-area pt-60 pb-100">
    <div class="container">
        <div class="section-title">
            <span>Lore peums</span>
            <h2>olor sit amet</h2>
        </div>
        <div class="tab industries-list-tab">
            <div class="row">
                <div class="col-lg-4">
                    <ul class="tabs">
                        <li class="single-rooms">
                            <img src="<?php echo $URL; ?>>/public/img/rooms/button-img-1.jpg" alt="Image">
                            <div class="room-content">
                                <h3>Lore upesm esl</h3>
                                <span>Lore upesm esl</span>
                            </div>
                        </li>
                        <li class="single-rooms">
                            <img src="<?php echo $URL; ?>/public/img/rooms/button-img-2.jpg" alt="Image">
                            <div class="room-content">
                                <h3>Lore upesm esl</h3>
                                <span>Lore upesm esl</span>
                            </div>
                        </li>
                        <li class="single-rooms">
                            <img src="<?php echo $URL; ?>/public/img/rooms/button-img-3.jpg" alt="Image">
                            <div class="room-content">
                                <h3>Lore upesm esl</h3>
                                <span>Lore upesm esl</span>
                            </div>
                        </li>
                        <li class="single-rooms">
                            <img src="<?php echo $URL; ?>/public/img/rooms/button-img-4.jpg" alt="Image">
                            <div class="room-content">
                                <h3>Lore upesm esl</h3>
                                <span>Lore upesm esl</span>
                            </div>
                        </li>
                        <li class="single-rooms">
                            <img src="<?php echo $URL?>/public/img/rooms/button-img-5.jpg" alt="Image">
                            <div class="room-content">
                                <h3>Lore upesm esl</h3>
                                <span>Lore upesm esl</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div class="tab_content">
                        <div class="tabs_item">
                            <div class="our-rooms-single-img room-bg-1">
                            </div>
                            <span class="preview-item">Lorem ipsum dolor sit</span>
                        </div>
                        <div class="tabs_item">
                            <div class="our-rooms-single-img room-bg-2">
                            </div>
                            <span class="preview-item">Lorem ipsum dolor sit</span>
                        </div>
                        <div class="tabs_item">
                            <div class="our-rooms-single-img room-bg-3">
                            </div>
                            <span class="preview-item">Lorem ipsum dolor sit</span>
                        </div>
                        <div class="tabs_item">
                            <div class="our-rooms-single-img room-bg-4">
                            </div>
                            <span class="preview-item">Lorem ipsum dolor sit</span>
                        </div>
                        <div class="tabs_item">
                            <div class="our-rooms-single-img room-bg-5">
                            </div>
                            <span class="preview-item">Lorem ipsum dolor sit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Rooms Area -->

<!-- Start City View Area -->
<section class="city-view-area ptb-100">
    <div class="container">
        <div class="city-wrap">
            <div class="single-city-item owl-carousel owl-theme">
                <div class="city-view-single-item">
                    <div class="city-content">
                        <span>Lorem ipsum dolor sit</span>
                        <h3>Lorem ipsum dolor sit</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur necessitatibus fugit eligendi accusantium vel quos debitis cupiditate ducimus placeat explicabo distinctio, consectetur eos animi, a voluptate delectus. Id, explicabo saepe Consequuntur</p>

                        <p>Lorem ipsum dolor sit</p>
                    </div>
                </div>
                <div class="city-view-single-item">
                    <div class="city-content">
                        <span>Lorem ipsum dolor sit</span>
                        <h3>Lorem ipsum dolor sit</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur necessitatibus fugit eligendi accusantium vel quos debitis cupiditate ducimus placeat explicabo distinctio, consectetur eos animi, a voluptate delectus. Id, explicabo saepe Consequuntur</p>

                        <p>Lorem ipsum dolor sittur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End City View Area -->

<!-- Start Exclusive Area -->
<section class="exclusive-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>Ofertas Exclusivas</span>
            <h2>Lorem ipsum dolor sit </h2>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="exclusive-wrap">
                    <div class="row">
                        <div class="col-lg-6 pr-0">
                            <div class="exclusive-img bg-1"></div>
                        </div>
                        <div class="col-lg-6 pl-0">
                            <div class="exclusive-content">
                                <span class="title">Lorem ipsum dolor sit</span>
                                <h3>Lorem ipsum dolor sit</h3>
                                <span class="review">
                                    4.5
                                    <a href="#">Lorem ipsum dolor sit</a>
                                </span>
                                <p>Lorem ipsum dolor sit</p>
                                <ul>
                                    <li>
                                        <i class="bx bx-time"></i>
                                        Duracion: 2Hours
                                    </li>
                                    <li>
                                        <i class="bx bx-target-lock"></i>
                                        Lorem ipsum dolor sit
                                    </li>
                                </ul>
                                <a href="book-table.html" class="default-btn">
                                    Lorem ipsum dolor sit
                                    <i class="flaticon-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="exclusive-wrap">
                    <div class="row">
                        <div class="col-lg-6 pr-0">
                            <div class="exclusive-img bg-2"></div>
                        </div>
                        <div class="col-lg-6 pl-0">
                            <div class="exclusive-content">
                                <span class="title">Lorem ipsum dolor sit</span>
                                <h3>Lorem ipsum dolor sit</h3>
                                <span class="review">
                                    5.0
                                    <a href="#">Lorem ipsum dolor sit</a>
                                </span>
                                <p>Lorem ipsum dolor sit</p>
                                <ul>
                                    <li>
                                        <i class="bx bx-time"></i>
                                        Lorem ipsum dolor sit
                                    </li>
                                    <li>
                                        <i class="bx bx-target-lock"></i>
                                        Lorem ipsum dolor sit
                                    </li>
                                </ul>
                                <a href="book-table.html" class="default-btn">
                                    Lorem ipsum dolor sit
                                    <i class="flaticon-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Exclusive Area -->

<!-- Start Booking Area -->
<section class="bokking-area pb-70">
    <div class="container">
        <div class="section-title">
            <span>Servicios</span>
            <h2>Todo lo que ofrecemos para tu mascota</h2>
        </div>

        <div class="row">
            <div class="booking-col-2">
                <div class="single-booking">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="book-icon flaticon-online-booking"></i>
                        <span class="booking-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    </a>

                    <div class="modal fade" id="staticBackdrop">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>

                                <div class="modal-footer">
                                    <a href="book-table.html" class="default-btn">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <i class="flaticon-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="booking-col-2">
                <div class="single-booking">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop-2">
                        <i class="book-icon flaticon-podium"></i>
                        <span class="booking-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    </a>

                    <div class="modal fade" id="staticBackdrop-2">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo neque eum tempore ducimus odit esse porro aperiam, delectus sunt omnis sed quod alias. Natus voluptate nemo explicabo fugiat quibusdam cupiditate quod alias. Natus voluptate.</p>
                                </div>

                                <div class="modal-footer">
                                    <a href="book-table.html" class="default-btn">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <i class="flaticon-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="booking-col-2">
                <div class="single-booking">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop-3">
                        <i class="book-icon flaticon-airport"></i>
                        <span class="booking-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    </a>

                    <div class="modal fade" id="staticBackdrop-3">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo neque eum tempore ducimus odit esse porro aperiam, delectus sunt omnis sed quod alias. Natus voluptate nemo explicabo fugiat quibusdam cupiditate quod alias. Natus voluptate.</p>
                                </div>

                                <div class="modal-footer">
                                    <a href="book-table.html" class="default-btn">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <i class="flaticon-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="booking-col-2">
                <div class="single-booking">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop-4">
                        <i class="book-icon flaticon-slow"></i>
                        <span class="booking-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    </a>

                    <div class="modal fade" id="staticBackdrop-4">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo neque eum tempore ducimus odit esse porro aperiam, delectus sunt omnis sed quod alias. Natus voluptate nemo explicabo fugiat quibusdam cupiditate quod alias. Natus voluptate.</p>
                                </div>

                                <div class="modal-footer">
                                    <a href="book-table.html" class="default-btn">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <i class="flaticon-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="booking-col-2">
                <div class="single-booking">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop-5">
                        <i class="book-icon flaticon-coffee-cup-1"></i>
                        <span class="booking-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    </a>

                    <div class="modal fade" id="staticBackdrop-5">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo neque eum tempore ducimus odit esse porro aperiam, delectus sunt omnis sed quod alias. Natus voluptate nemo explicabo fugiat quibusdam cupiditate quod alias. Natus voluptate.</p>
                                </div>

                                <div class="modal-footer">
                                    <a href="book-table.html" class="default-btn">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <i class="flaticon-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Booking Area -->


<!-- start Testimonials Area -->
<section class="testimonials-area pb-100">
    <div class="container">
        <div class="section-title">
            <span>Testimonios</span>
            <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
        </div>
        <div class="testimonials-wrap owl-carousel owl-theme">
            <div class="single-testimonials">
                <ul>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                </ul>
                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <div class="testimonials-content">
                    <img src="<?php echo $URL ; ?>/public/img/testimonials/2.jpg" alt="Image">
                    <h4>Ayman Jenis</h4>
                    <span>CEO@Leasuely</span>
                </div>
            </div>
            <div class="single-testimonials">
                <ul>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                </ul>
                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <div class="testimonials-content">
                    <img src="<?php echo $URL;?>/public/img/testimonials/3.jpg" alt="Image">
                    <h4>Ayman Jenis</h4>
                    <span>CEO@Leasuely</span>
                </div>
            </div>
            <div class="single-testimonials">
                <ul>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                    <li>
                        <i class="bx bxs-star"></i>
                    </li>
                </ul>
                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <div class="testimonials-content">
                    <img src="<?php echo $URL ; ?>/public/img/testimonials/1.jpg" alt="Image">
                    <h4>Ayman Jenis</h4>
                    <span>CEO@Leasuely</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonials Area -->

<!-- End News Area -->
<section class="news-area pb-60">
    <div class="container">
        <div class="section-title">
            <span>Blog</span>
            <h2>Noticias y Novedades </h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-news">
                    <div class="news-img">
                        <a href="news-details.html">
                            <img src="<?php echo $URL ; ?>/public/img/news/1.jpg" alt="Image">
                        </a>
                        <div class="dates">
                            <span>HOTEL</span>
                        </div>
                    </div>
                    <div class="news-content-wrap">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="flaticon-user"></i>
                                    Admin
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="flaticon-conversation"></i>
                                    Comentarios
                                </a>
                            </li>
                        </ul>
                        <a href="news-details.html">
                            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                        </a>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga veritatis veniam corrupti perferendis.</p>
                        <a class="read-more" href="news-details.html">
                            Leer mas
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-news">
                    <div class="news-img">
                        <a href="news-details.html">
                            <img src="<?php echo $URL ; ?>/public/img/news/2.jpg" alt="Image">
                        </a>
                        <div class="dates">
                            <span>Precios</span>
                        </div>
                    </div>
                    <div class="news-content-wrap">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="flaticon-user"></i>
                                    Admin
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="flaticon-conversation"></i>
                                    Comment
                                </a>
                            </li>
                        </ul>
                        <a href="news-details.html">
                            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                        </a>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga veritatis veniam corrupti perferendis.</p>
                        <a class="read-more" href="news-details.html">
                            Leer mas
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="single-news">
                    <div class="news-img">
                        <a href="news-details.html">
                            <img src="<?php echo $URL ; ?>/public/img/news/1.jpg" alt="Image">
                        </a>
                        <div class="dates">
                            <span>STORE</span>
                        </div>
                    </div>
                    <div class="news-content-wrap">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="flaticon-user"></i>
                                    Admin
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="flaticon-conversation"></i>
                                    Comment
                                </a>
                            </li>
                        </ul>
                        <a href="news-details.html">
                            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                        </a>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga veritatis veniam corrupti perferendis.</p>
                        <a class="read-more" href="news-details.html">
                            Read More
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End News Area -->
<!-- Start Footer Area -->
<footer class="footer-top-area pt-140 jarallax">
	<div class="container">
		<div class="section-title">
			<h2>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		</div>
		<div class="footer-tops-area pb-60">
			<div class="row">
				<!-- Start Subscribe Area -->
				<div class="subscribe-wrap">
					<form class="newsletter-form" data-toggle="validator">
						<input type="email" class="input-tracking" placeholder="Your Email" name="EMAIL" required autocomplete="off">

						<button class="default-btn active" type="submit">
							Subscribe
							<i class="flaticon-right"></i>
						</button>

						<div id="validator-newsletter" class="form-result"></div>
					</form>
				</div>
				<!-- End Subscribe Area -->
			</div>
		</div>
		<div class="footer-middle-area pt-60">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="single-widget">
						<a href="<?php echo $URL; ?>">
							<img src="<?php echo $URL;?>/public/img/home-one/footer-logo.png" alt="Image">
						</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat molestiae corporis, magni maxime perferendis ducimus.</p>
						<ul class="social-icon">
							<li>
								<a href="#">
									<i class="bx bxl-facebook"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="bx bxl-twitter"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="bx bxl-pinterest-alt"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="bx bxl-linkedin"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="bx bxl-youtube"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-widget">
						<h3>Quick Links</h3>
						<ul>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Lorem ipsum
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Lorem ipsum
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Lorem ipsum
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									FAQ
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Contacto
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-widget">
						<h3>Services</h3>
						<ul>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Lorem ipsum
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Lorem ipsum
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Lorem ipsum
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Lorem ipsum
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Lorem ipsum
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Lorem ipsum
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-widget">
						<h3>Contactos</h3>
						<ul class="information">
							<li class="address">
								<i class="flaticon-maps-and-flags"></i>
								<span>Direccion</span>
								Lorem ipsum
							</li>
							<li class="address">
								<i class="flaticon-call"></i>
								<span>Telefono</span>
								<a href="tel:+882-569-756">
									+882-569-756
								</a>
							</li>
							<li class="address">
								<i class="flaticon-envelope"></i>
								<span>Email</span>
								<a href="mailto:hello@ecorik.com">
									hello@ecorik.com
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom-area">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="copy-right">
						<p>Copyright @2022 <a href="<?php echo $URL ; ?>">PetMania</a>. All Rights Reserved</p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="designed">
						<p>Diseñada por <i class='bx bx-heart'></i> <a href="https://envytheme.com/" target="_blank">SystemAB</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-shape">
		<img src="<?php echo $URL ; ?>/public/img/shape/white-shape-bottom.png" alt="Image">
	</div>
</footer>
<!-- End Footer Area -->

<!-- Start Go Top Area -->
<div class="go-top">
	<i class='bx bx-chevrons-up bx-fade-up'></i>
	<i class='bx bx-chevrons-up bx-fade-up'></i>
</div>
<!-- End Go Top Area -->


<!-- Jquery Min JS -->
<script src="<?php echo $URL;?>public/js/jquery.min.js"></script>
<!-- Boostrap -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Bootstrap Bundle Min JS -->
<script src="<?php echo $URL ; ?>/public/js/bootstrap.bundle.min.js"></script>
<!-- Meanmenu Min JS -->
<script src="<?php echo $URL ; ?>/public/js/meanmenu.min.js"></script>
<!-- Owl Carousel Min JS -->
<script src="<?php echo $URL ; ?>/public/js/owl.carousel.min.js"></script>
<!-- Wow Min JS -->
<script src="<?php echo $URL ; ?>/public/js/wow.min.js"></script>
<!-- Nice Select Min JS -->
<script src="<?php echo $URL ; ?>/public/js/nice-select.min.js"></script>
<!-- Magnific Popup Min JS -->
<script src="<?php echo $URL ; ?>/public/js/magnific-popup.min.js"></script>
<!-- Mixitup JS -->
<script src="<?php echo $URL ; ?>/public/js/jquery.mixitup.min.js"></script>
<!-- Appear Min JS -->
<script src="<?php echo $URL ; ?>/public/js/appear.min.js"></script>
<!-- Odometer Min JS -->
<script src="<?php echo $URL ; ?>/public/js/odometer.min.js"></script>
<!-- Datepicker Min JS -->
<script src="<?php echo $URL ; ?>/public/js/bootstrap-datepicker.min.js"></script>
<!-- Ofi Min JS -->
<script src="<?php echo $URL ; ?>/public/js/ofi.min.js"></script>
<!-- jarallax Min JS -->
<script src="<?php echo $URL ; ?>/public/js/jarallax.min.js"></script>
<!-- Form Validator Min JS -->
<script src="<?php echo $URL ; ?>/public/js/form-validator.min.js"></script>
<!-- Contact JS -->
<script src="<?php echo $URL ; ?>/public/js/contact-form-script.js"></script>
<!-- Ajaxchimp Min JS -->
<script src="<?php echo $URL ; ?>/public/js/ajaxchimp.min.js"></script>
<!-- Calendar -->
<script src="<?php echo $URL ; ?>/public/fullcalendar/index.global.min.js"></script>
<!-- Calendar Español -->
<script src="<?php echo $URL ; ?>/public/fullcalendar/es.global.min.js"></script>
<!-- Custom JS -->
<script src="<?php echo $URL ; ?>/public/js/custom.js"></script>
<!-- Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo $URL ;?>/public/js/pages/index.js'"></script>

</body>

</html>


