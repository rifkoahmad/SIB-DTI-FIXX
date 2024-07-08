
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>kelompok 3 kelas 2C TRPL</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    </head>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const button = document.getElementById("animatedButton");

            // Adding a mouseover event to trigger the animation
            button.addEventListener("mouseover", function() {
                button.classList.add("hovered");
            });

            // Removing the animation class when mouse leaves
            button.addEventListener("mouseout", function() {
                button.classList.remove("hovered");
            });
        });
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .btn-warning {
            display: inline-block;
            padding: 10px 20px;
            font-size: 20px;
            color: #fff;
            background-color: #f0ad4e;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
            animation: pulse 1.5s infinite;
        }

        .btn-warning:hover {
            background-color: #ec971f;
        }

         /* Custom Animations for Section */
         @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .animate-text {
            animation: fadeIn 2s ease-in-out;
        }

        .animate-photo {
            animation: pulse 2s infinite;
        }

        .rounded-circle {
            transition: transform 0.3s ease-in-out;
        }

        .rounded-circle:hover {
            transform: scale(1.2);
        }

    </style>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">SIB-DTI</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <ul class="navbar-nav ms-auto my-2 my-lg-0">
                            <li class="nav-item"><a class="nav-link" href="#home">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-baseline">

                        <style>
                            @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');

                            h1 {
                                font-family: 'Inter', sans-serif;
                                font-weight: 1000;
                                font-size: 2.5rem;
                                color: #ffffff;
                                line-height: 1.2;
                            }
                        </style>

                        <h1>
                            SISTEM INFORMASI INVENTARIS BARANG DI LABOR TI
                        </h1>

                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">"Jika Anda menjual produk fisik, Anda memiliki banyak sisi positif dan ketidakpastian Q4, tetapi sekarang Anda harus mengelola uang Anda untuk mencapai K4 sehingga Anda dapat berinvestasi dalam membangun inventaris untuk kinerja yang berlebihan."</p>
                        <a class="btn btn-warning btn-xl" href="/register">---> Register disini <----</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-dark" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">About Us</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Sebuah Website atau platform yang memudahkan pengguna dalam melakukan peminjaman barang di labor TI</p>

                    </div>
                </div>
            </div>
        </section>

        <section class="page-section " id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-dark  text-center mt-0">Jurusan Teknologi Infomasi</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="assets/img/logoprodi1.PNG" title="Team Member Name">
                                <img class="img-fluid rounded-circle mb-2" src="assets/img/logoprodi1.PNG" alt="Leader Team" style="width: 150px; height: 150px;">
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="assets/img/logoprodi2.PNG" title="Team Member Name">
                                <img class="img-fluid rounded-circle mb-2" src="assets/img/logoprodi2.PNG" alt="Member Team" style="width: 150px; height: 150px;">
                            </a>


                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="assets/img/logoprodi3.PNG" title="Team Member Name">
                                <img class="img-fluid rounded-circle mb-2" src="assets/img/logoprodi3.PNG" alt="Member Team" style="width: 150px; height: 150px;">
                            </a>


                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="assets/img/logoprodi4.PNG" title="Team Member Name">
                                <img class="img-fluid rounded-circle mb-2" src="assets/img/logoprodi4.PNG" alt="Member Team" style="width: 150px; height: 150px;">
                            </a>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="assets/img/logoprodi6.PNG" title="Team Member Name">
                                <img class="img-fluid rounded-circle mb-2" src="assets/img/logoprodi6.PNG" alt="Member Team" style="width: 150px; height: 150px;">
                            </a>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="assets/img/logoprodi7.PNG" title="Team Member Name">
                                <img class="img-fluid rounded-circle mb-2" src="assets/img/logoprodi7.PNG" alt="Member Team" style="width: 150px; height: 150px;">
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services-->
        <section class="page-section bg-dark" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-white text-center mt-0">Team kelompok 3 -  2C TRPL</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="assets/img/team/photo1.jpg" title="Team Member Name">
                                <img class="img-fluid rounded-circle mb-2" src="assets/kardusmah.jpeg" alt="Leader Team" style="width: 150px; height: 150px;">
                            </a>
                            <h3 class="text-white h4 mb-2">Leader Team</h3>
                            <p class="text-muted mb-0">Razi Syahriful Zanah</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="assets/img/team/photo2.jpg" title="Team Member Name">
                                <img class="img-fluid rounded-circle mb-2" src="assets/oppa.jpeg" alt="Member Team" style="width: 150px; height: 150px;">
                            </a>
                            <h3 class="text-white h4 mb-2">Member Team</h3>
                            <p class="text-muted mb-0">Fitri Sakinah</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="assets/img/team/photo3.jpg" title="Team Member Name">
                                <img class="img-fluid rounded-circle mb-2" src="assets/onepiece.jpeg" alt="Member Team" style="width: 150px; height: 150px;">
                            </a>
                            <h3 class="text-white h4 mb-2">Member Team</h3>
                            <p class="text-muted mb-0">Rifko Ahmad</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="assets/img/team/photo4.jpg" title="Team Member Name">
                                <img class="img-fluid rounded-circle mb-2" src="assets/orangganteng.jpeg" alt="Member Team" style="width: 150px; height: 150px;">
                            </a>
                            <h3 class="text-white h4 mb-2">Member Team</h3>
                            <p class="text-muted mb-0">Salma Husna</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Portfolio-->

        <section class="page-section bg-primary" id="berita">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-black mt-0">--  Berita Hari Ini --</h2>
                    </div>
                </div>
            </div>
        </section>
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg" title="Teknologi Infomasi kembali membuat prodi baru viral">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Berita</div>
                                <div class="project-name">Teknologi Infomasi kembali membuat prodi baru viral</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->

        <!-- Contact-->
        <section class="page-section bg-dark" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="text-white mt-0">Contact Us</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Ready to start your next project with us? Send us a messages and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div class="text-white  ">084324212331</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2024 - kelompok 3 PBL 2C</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
