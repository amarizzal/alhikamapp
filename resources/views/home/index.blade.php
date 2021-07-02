<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0099ff">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/jpg" href="assets/logo-only-ospam.png"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Own CSS -->
    <link rel="stylesheet" href="style/style.css">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    // Loader
    var jbt = document.getElementById("spinner");
        Loadgo.init(jbt);
        // Loadgo.loop(jbt, 10);
        $(document).ready(function(){
            $("#spinner").fadeOut();
        })
    </script>

    <title>Muara Cita</title>
  </head>
  <body>
  <!-- ============== SPINNER ========== -->
  <!-- <img id="spinner" src="assets/logo-only-ospam.png" alt="" width="200"class="d-inline-block align-text-top"> -->

    <!-- ================= NAVBAR ============== -->
    <nav class="navbar fixed-top navbar-light">
        <div class="container nav is-visible">
            <a class="navbar-brand" style="color: #000B76;" href="#">
                <img src="assets/logo-only-ospam.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                Muara Cita
            </a>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a id="home" class="nav-link active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a id="logo" class="nav-link" aria-current="page" href="#jumbotron">Logo</a>
                </li>
                <li class="nav-item">
                    <a id="visi" class="nav-link" href="#visimisi">Visi Misi</a>
                </li>
                <li class="nav-item">
                    <a id="anggota" class="nav-link" href="#">Anggota</a>
                </li>
            </ul>
            <a href="{{ url('/login') }}" class="btn btn-dark">Login</a>
        </div>
    </nav>

    <!-- ============================ JUMBOTRON ============================== -->
    <section class="jumbotron" id="jumbotron" style="background-color: #f3f4f5">
        <div class="jumbotron-wrapper pt-5" style="background-color: #0099ff; padding-bottom: -1px;">
            <div class="container" id="jumbotron-container">
                <div class="row align-items-center justify-content-center pt-5">
                    <div class="col-md-6 col-xs-12">
                        <!-- <h1 class="jumbotron-title">OSPAM</h1> -->
                        <h1 class="title">Muara Cita</h1>
                        <p class="jumbotron-text">Sinergi Bersama Santri</p>
                    </div>
                    <div class="col-md-6 col-xs-12 row justify-content-center p-6">
                        <div class="img-wrapper text-center">
                            <img src="assets/logo-only-ospam.png" alt="" height=400 class="m-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,64L60,96C120,128,240,192,360,224C480,256,600,256,720,245.3C840,235,960,213,1080,176C1200,139,1320,85,1380,58.7L1440,32L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
        <!-- <svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 190" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(0, 153, 255, 1)" offset="0%"></stop><stop stop-color="rgba(0, 11, 118, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,95L80,79.2C160,63,320,32,480,38C640,44,800,89,960,88.7C1120,89,1280,44,1440,41.2C1600,38,1760,76,1920,79.2C2080,82,2240,51,2400,50.7C2560,51,2720,82,2880,98.2C3040,114,3200,114,3360,123.5C3520,133,3680,152,3840,142.5C4000,133,4160,95,4320,79.2C4480,63,4640,70,4800,85.5C4960,101,5120,127,5280,136.2C5440,146,5600,139,5760,117.2C5920,95,6080,57,6240,44.3C6400,32,6560,44,6720,69.7C6880,95,7040,133,7200,136.2C7360,139,7520,108,7680,98.2C7840,89,8000,101,8160,95C8320,89,8480,63,8640,63.3C8800,63,8960,89,9120,101.3C9280,114,9440,114,9600,104.5C9760,95,9920,76,10080,76C10240,76,10400,95,10560,101.3C10720,108,10880,101,11040,107.7C11200,114,11360,133,11440,142.5L11520,152L11520,190L11440,190C11360,190,11200,190,11040,190C10880,190,10720,190,10560,190C10400,190,10240,190,10080,190C9920,190,9760,190,9600,190C9440,190,9280,190,9120,190C8960,190,8800,190,8640,190C8480,190,8320,190,8160,190C8000,190,7840,190,7680,190C7520,190,7360,190,7200,190C7040,190,6880,190,6720,190C6560,190,6400,190,6240,190C6080,190,5920,190,5760,190C5600,190,5440,190,5280,190C5120,190,4960,190,4800,190C4640,190,4480,190,4320,190C4160,190,4000,190,3840,190C3680,190,3520,190,3360,190C3200,190,3040,190,2880,190C2720,190,2560,190,2400,190C2240,190,2080,190,1920,190C1760,190,1600,190,1440,190C1280,190,1120,190,960,190C800,190,640,190,480,190C320,190,160,190,80,190L0,190Z"></path></svg> -->
        </section>

        <!-- =========================== LOGO ================================== -->
        <section class="logo">
            <div class="logo-wrapper" style="background-color: #f3f4f5; padding-bottom: -1px;">
                <div class="container" id="logo-container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 col-xs-12">
                            <h1 class="title">Filosofi</h1>
                            <h1 class="title">Logo</h1>
                            <p class="text"></p>
                        </div>
                        <div class="col-md-6 col-xs-12 row justify-content-center p-6">
                        <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active" id="detail-1">
                                    <img src="assets/logo-detail-1.png" class="d-block w-50 m-auto" alt="assets/logo-detail-.png">
                                    <div class="carousel-caption d-none d-md-block"  style="
                                        float: left;
                                        position: sticky;
                                        left: auto;
                                        margin-top: -50px;
                                    ">
                                        <br><br>
                                        <h5 class="">Dua garis lengkung di bawah</h5>
                                        <p>Genangan air yang merupakan bagian dari muara. Menggambarkan santri Al Hikam yang berasal dari berbagai latar belakang dan kemudian bermuara menjadi satu</p>
                                    </div>
                                </div>
                                <div class="carousel-item" id="detail-2">
                                    <img src="assets/logo-detail-2.png" class="d-block w-50 m-auto" alt="assets/logo-detail-.png">
                                    <div class="carousel-caption d-none d-md-block"  style="
                                        float: left;
                                        position: sticky;
                                        left: auto;
                                        margin-top: 0px;
                                    ">
                                        <h5>Dua tangan yang saling berpangku</h5>
                                        <p>menggambarakan kesinergisan antar elemen pesantren yang diharapkan dapat memuluskan tercapainya tujuan atau cita-cita baik dari masing-masing santri maupun lembaga pesantren itu sendiri.</p>
                                    </div>
                                </div>
                                <div class="carousel-item" id="detail-3 ">
                                    <img src="assets/logo-detail-3.png" class="d-block w-50 m-auto" alt="assets/logo-detail-.png">
                                    <div class="carousel-caption d-none d-md-block"  style="
                                        float: left;
                                        position: sticky;
                                        left: auto;
                                        margin-top: 0px;
                                    ">
                                        <h5>Gambar yang menyerupai manusia dan tiga bintang </h5>
                                        <p>menggambarkan keberhasilan dalam mencapai tujuan atau cita-cita yang diinginkan. Tujuan atau cita-cita tersebut nantinya juga akan mencangkup tiga motto pesantren, yakni amaliah agama, prestasi ilmiah, dan kesiapan hidup.</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,218.7C384,235,480,245,576,240C672,235,768,213,864,208C960,203,1056,213,1152,218.7C1248,224,1344,224,1392,224L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
        </section>
        
        <!-- =========================== VISI MISI ============================= -->
        <section class="visimisi" id="visimisi">
            <div class="container" id="visimisi-container">
                <h1 class="title text-center">Kemana kita Bergerak?</h1>
                <div class="row align-items-center">
                    <div class="col-md-6 col-xs-12 text-center">
                        <img src="assets/visi-misi.svg" alt="" height=400 class="m-auto text-center">
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="visimisi-wrapper my-5">
                            <h3 class="title-sec">Visi</h3>
                            <p class="text">Terciptanya sinergitas dalam pembentukan karakter santri mahasiswa yang religius, cendekia, dan mandiri dengan berlandaskan ruhul ma'had</p>
                        </div>
                        <div class="visimisi-wrapper my-5">
                            <h3 class="title-sec">Misi</h3>
                            <ul class="text">
                                <li>Menumbuhkankembangkan sikap kebersamaan, sosial, dan tanggung jawab dalam pesantren</li>
                                <li>Meningkatkan partisipasi santri dalam kegiatan keilmiahan</li>
                                <li>Membudayakan nilai-nilai religius dalam lingkungan pesantren</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,218.7C384,235,480,245,576,240C672,235,768,213,864,208C960,203,1056,213,1152,218.7C1248,224,1344,224,1392,224L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg> -->
        </section>

        <!-- ========================= ANGGOTA =============================== -->
        <section class="anggota">
            <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: -140px" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,218.7C384,235,480,245,576,240C672,235,768,213,864,208C960,203,1056,213,1152,218.7C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
            <div class="anggota-wrapper" style="background-color: #f3f4f5">
                <div class="container" id="anggota-container">
                    <h1 class="title text-center mb-3">Anggota</h1>
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6" aria-label="Slide 7"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="7" aria-label="Slide 8"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="8" aria-label="Slide 9"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/anggota-bph.png" class="d-block w-50 m-auto" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/anggota-bph2.png" class="d-block w-50 m-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/anggota-husos.png" class="d-block w-50 m-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/anggota-keamanan.png" class="d-block w-50 m-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/anggota-keilmuan.png" class="d-block w-50 m-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/anggota-medkominfo.png" class="d-block w-50 m-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/anggota-psdm.png" class="d-block w-50 m-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/anggota-rt.png" class="d-block w-50 m-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/anggota-ubudiyah.png" class="d-block w-50 m-auto" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <br><br>
            </div>
        </section>

        <!-- ==================== FOOTER ==================== -->
        <section style="background-color: #0099ff; color: white;">
            <div class="container py-3 is-visible">
                <h5 class="text-center">Copyright - Medkominfo OSPAM Muara Cita</h5>
            </div>
        </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    <!-- ============================= LOADER ============================= -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/LoadGo/2.2/loadgo-nojquery.min.js"></script>

    <!-- ============================ OWN JAVASCRIPT ========================= -->
    <script>
        const navbar = document.querySelector(".navbar");
        const jumbotron = document.querySelector(".jumbotron").offsetTop;
        const logologo = document.querySelector(".logo").offsetTop;
        const visimisi = document.querySelector(".visimisi").offsetTop;
        const anggota = document.querySelector(".anggota").offsetTop;
        // const logo = document.querySelector(".logo").scrollTop;

        const elJumbotron = document.querySelector("#jumbotron-container");
        const elLogo = document.querySelector("#logo-container");
        const elVisi = document.querySelector("#visimisi-container");
        const elAnggota = document.querySelector("#anggota-container");
        
        // ======= Item navbar
        const home = document.querySelector("#home");
        const logo = document.querySelector("#logo");
        const visi = document.querySelector("#visi");
        const ang = document.querySelector("#anggota");

        document.addEventListener('scroll', function(e) {
            let lastKnownScrollPosition = window.scrollY;
            
            // ===== Interactive Navbar
            lastKnownScrollPosition += 250;
            console.log(lastKnownScrollPosition, visimisi);
            if (lastKnownScrollPosition > 450) {
                navbar.style.backgroundColor = "#0099ff";
            } else {
                navbar.style.backgroundColor = "transparent";
            }

            // ===== Interactive item Navbar
            if (lastKnownScrollPosition > anggota) {
                resetClass();
                ang.classList.add("active");
                elAnggota.classList.add("is-visible");
            } else if (lastKnownScrollPosition > visimisi) {
                resetClass();
                visi.classList.add("active");
                elVisi.classList.add("is-visible");
            } else if (lastKnownScrollPosition > logologo) {
                resetClass();
                logo.classList.add("active");
                elLogo.classList.add("is-visible");
            } else if (lastKnownScrollPosition > jumbotron) {
                // alert("tes");
                resetClass();
                home.classList.add("active");
                elJumbotron.classList.add("is-visible");
            } 

        });

        const resetClass = () => {
            home.classList.remove("active");
            logo.classList.remove("active");
            visi.classList.remove("active");
            ang.classList.remove("active");
        }

        // DETAIL TEXT FILOSOFI LOGO
        const item = document.querySelectorAll(".carousel-item");
        const text = document.querySelector(".logo-wrapper .text");
        console.log(item);
        item.forEach(element => {
            let id = element.id;
            console.log(element.className);
            if (element.className == "carousel-item active") {
                text.innerHtml = 'test';
            }
        });

        
        
    </script>
  </body>
</html>