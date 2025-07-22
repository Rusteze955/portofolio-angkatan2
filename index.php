<?php
include 'admin/config/koneksi.php';
if (isset($_POST['send'])) {
    $your_name = $_POST['your_name'];
    $your_email = $_POST['your_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = mysqli_query($config, "INSERT INTO contacts (your_name, your_email, subject, message) VALUES ('$your_name','$your_email','$subject', '$message')");
    if ($query) {
        header("location:?kirim=berhasil");
    }
}
$queryHome = mysqli_query($config, "SELECT * FROM home ORDER BY id DESC");
$rowHome = mysqli_fetch_assoc($queryHome);

$querySkill = mysqli_query($config, "SELECT * FROM skill ORDER BY rating DESC");
$rowSkill = mysqli_fetch_all($querySkill, MYSQLI_ASSOC);

$queryPorto = mysqli_query($config, "SELECT * FROM portofolios ORDER BY id DESC");
$portofolio = mysqli_fetch_all($queryPorto, MYSQLI_ASSOC);

$queryProfile = mysqli_query($config, "SELECT * FROM abouts ORDER BY id DESC");
$rowProfile = mysqli_fetch_assoc($queryProfile);

$selectCategories = mysqli_query($config, "SELECT * FROM categories ORDER BY id DESC");
$rowCategories = mysqli_fetch_all($selectCategories, MYSQLI_ASSOC);

$querySumary = mysqli_query($config, "SELECT * FROM sumary ORDER BY id DESC");
$rowSumary = mysqli_fetch_assoc($querySumary);

$queryEducation = mysqli_query($config, "SELECT * FROM education ORDER BY id DESC");
$rowEducation = mysqli_fetch_assoc($queryEducation);

$queryExperience = mysqli_query($config, "SELECT * FROM experience ORDER BY id DESC");
$rowExperience = mysqli_fetch_assoc($queryExperience);

$selectServices = mysqli_query($config, "SELECT * FROM services ORDER BY id DESC");
$rowServices = mysqli_fetch_assoc($selectServices);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portofolio Abdullah</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="admin/assets/img/cropped circle_abdullah.png" rel="icon">
    <link href="depan/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="depan/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="depan/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="depan/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="depan/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="depan/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="depan/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header dark-background d-flex flex-column">
        <i class="header-toggle d-xl-none bi bi-list"></i>

        <div class="profile-img">
            <img src="admin/uploads/<?php echo $rowProfile['photo'] ?>" alt="" class="img-fluid rounded-circle">
        </div>

        <a href="index.html" class="logo d-flex align-items-center justify-content-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename"><?php echo $rowHome['name'] ?></h1>
        </a>

        <div class="social-links text-center">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
                <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
                <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
                <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
                <!-- <li class="dropdown"><a href="#"><i class="bi bi-menu-button navicon"></i> <span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li> -->
                <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
            </ul>
        </nav>

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="admin/uploads/<?php echo isset($rowHome['photo']) ? $rowHome['photo'] : '' ?>" alt="" data-aos="fade-in" class="">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <h2><?php echo isset($rowHome['name']) ? $rowHome['name'] : '' ?></h2>
                <p>I'm <?php echo isset($rowHome['description']) ? $rowHome['description'] : '' ?></p>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About</h2>
                <?php echo isset($rowProfile['description']) ? $rowProfile['description'] : '' ?>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 justify-content-center">
                    <div class="col-lg-4">
                        <img src="./admin/uploads/<?php echo $rowProfile['photo'] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 content">
                        <h2>UI/UX Designer &amp; Web Developer.</h2>
                        <!-- <p class="fst-italic py-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p> -->
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo isset($rowProfile['birthday']) ? $rowProfile['birthday'] : '' ?></span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><?php echo isset($rowProfile['website']) ? $rowProfile['website'] : '' ?></span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo isset($rowProfile['phone']) ? $rowProfile['phone'] : '' ?></span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?php echo isset($rowProfile['city']) ? $rowProfile['city'] : '' ?></span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?php echo isset($rowProfile['age']) ? $rowProfile['age'] : '' ?></span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?php echo isset($rowProfile['degree']) ? $rowProfile['degree'] : '' ?></span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo isset($rowProfile['email']) ? $rowProfile['email'] : '' ?></span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span><?php echo isset($rowProfile['freelance']) ? $rowProfile['freelance'] : '' ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <!-- <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
                        </div>
                    </div>

                </div>

            </div>

        </section> -->
        <!-- /Stats Section -->

        <!-- Skills Section -->
        <section id="skills" class="skills section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Skills</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row skills-content skills-animation">

                    <div class="col-lg-6">
                        <?php foreach ($rowSkill as $index => $skill) {?>
                        <?php if($index % 2 == 0) {?>
                            <div class="progress">
                                <span class="skill"><span><?php echo $skill['name'] ?></span> <i class="val"><?php echo $skill['rating'] ?>%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $skill['rating'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div><!-- End Skills Item -->
                        <?php } ?>
                        <?php } ?>
                    </div>

                    <div class="col-lg-6">
                        <?php foreach ($rowSkill as $index => $skill) {?>
                        <?php if($index % 2 == 1) {?>
                            <div class="progress">
                                <span class="skill"><span><?php echo $skill['name'] ?></span> <i class="val"><?php echo $skill['rating'] ?>%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $skill['rating'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div><!-- End Skills Item -->
                        <?php } ?>
                        <?php } ?>
                    </div>

                </div>

            </div>

        </section><!-- /Skills Section -->

        <!-- Resume Section -->
        <section id="resume" class="resume section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Resume</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="resume-title"><?php echo $rowSumary['name'] ?></h3>

                        <div class="resume-item pb-0">
                            <?php echo $rowSumary['description'] ?>
                        </div><!-- Edn Resume Item -->

                        <h3 class="resume-title"><?php echo $rowEducation['name'] ?></h3>
                        <div class="resume-item">
                            <?php echo $rowEducation['description'] ?>
                        </div><!-- Edn Resume Item -->
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="resume-title"><?php echo $rowExperience['name'] ?></h3>
                        <div class="resume-item">
                            <?php echo $rowExperience['description'] ?>
                        </div><!-- Edn Resume Item -->
                    </div>

                </div>

            </div>

        </section><!-- /Resume Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Portfolio</h2>
                <p>Portofolio ini berisi kumpulan karya dan pengalaman saya sebagai Junior Web Developer. Di dalamnya, saya menampilkan berbagai proyek yang telah saya kerjakan.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        <?php foreach ($portofolio as $index => $porto) { ?>
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                                <div class="portfolio-content h-100">
                                    <img src="admin/uploads/<?php echo $porto['photo'] ?>" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4><?php echo $porto['name_porto'] ?></h4>
                                        <p><?php echo $porto['description'] ?></p>
                                        <a href="admin/uploads/<?php echo $porto['photo'] ?>" title="<?php echo $porto['name_porto'] ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Portfolio Item -->
                        <?php } ?>
                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Saya selalu terbuka untuk kolaborasi, diskusi proyek, atau peluang kerja di bidang web development dan UI/UX. Jika kamu memiliki pertanyaan, ingin bekerja sama, atau hanya ingin menyapa, silakan hubungi saya melalui kontak di bawah ini:</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p><?php echo $rowProfile ['city'] ?></p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Us</h3>
                                    <p><?php echo $rowProfile ['phone'] ?></p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Us</h3>
                                    <p><?php echo $rowProfile ['email'] ?></p>
                                </div>
                            </div><!-- End Info Item -->

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form action="" method="post" data-aos="fade-up" data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Your Name</label>
                                    <input type="text" name="your_name" id="name-field" class="form-control" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Your Email</label>
                                    <input type="email" class="form-control" name="your_email" id="email-field" required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field" required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Message</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary" type="submit" name="send">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer position-relative light-background">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright</span> <strong class="px-1 sitename"><?php echo $rowHome ['name'] ?></strong> <span>All Rights Reserved</span></p>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="depan/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="depan/assets/vendor/php-email-form/validate.js"></script>
    <script src="depan/assets/vendor/aos/aos.js"></script>
    <script src="depan/assets/vendor/typed.js/typed.umd.js"></script>
    <script src="depan/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="depan/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="depan/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="depan/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="depan/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="depan/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="depan/assets/js/main.js"></script>

</body>

</html>