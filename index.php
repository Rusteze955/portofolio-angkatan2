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
$queryProfile = mysqli_query($config, "SELECT * FROM abouts ORDER BY id DESC");
$rowProfile = mysqli_fetch_assoc($queryProfile);

$selectCategories = mysqli_query($config, "SELECT * FROM categories");
$rowCategories = mysqli_fetch_all($selectCategories, MYSQLI_ASSOC);

$selectPortofolios = mysqli_query($config, "SELECT categories.name, portofolios.* FROM portofolios LEFT JOIN categories ON categories.id = portofolios.id_category ORDER BY id DESC");
$rowPortofolios = mysqli_fetch_all($selectPortofolios, MYSQLI_ASSOC);

$selectResume = mysqli_query($config, "SELECT * FROM resume ORDER BY id DESC");
$rowResume = mysqli_fetch_assoc($selectResume);

$selectServices = mysqli_query($config, "SELECT * FROM services ORDER BY id DESC");
$rowServices = mysqli_fetch_all($selectServices, MYSQLI_ASSOC);

$selectTestimonial = mysqli_query($config, "SELECT * FROM testimonial ORDER BY id DESC");
$rowTestimonials = mysqli_fetch_all($selectTestimonial, MYSQLI_ASSOC);

$selectSkill = mysqli_query($config, "SELECT * FROM skill ORDER BY id DESC");
$rowSkill = mysqli_fetch_all($selectSkill, MYSQLI_ASSOC);

// foreach ($rowPortofolios as $key => $value) {
//     echo $value['name_porto'];
// }
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - iPortfolio Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="depan/assets/img/favicon.png" rel="icon">
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
            <img src="depan/assets/img/my-profile-img.jpg" alt="" class="img-fluid rounded-circle">
        </div>

        <a href="index.html" class="logo d-flex align-items-center justify-content-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Mulyono</h1>
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
                <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
                <li class="dropdown"><a href="#"><i class="bi bi-menu-button navicon"></i> <span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
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
                </li>
                <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
            </ul>
        </nav>

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="depan/assets/img/hero-bg.jpg" alt="" data-aos="fade-in" class="">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <h2><?php echo isset($rowProfile['name']) ? $rowProfile['name'] : '' ?></h2>
                <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer">Designer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
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
                        <p class="fst-italic py-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
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
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Skills Section -->
        <section id="skills" class="skills section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Skills</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row skills-content skills-animation">

                    <div class="col-lg-6">
                        <?php foreach ($rowSkill as $key => $value) { ?>
                            <?php if ($key % 2 == 0) { ?>
                                <div class="progress">
                                    <span class="skill"><span><?php echo $value['name'] ?></span> <i class="val"><?php echo $value['rating'] ?>%</i></span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $value['rating'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div><!-- End Skills Item -->
                            <?php } ?>
                        <?php } ?>

                    </div>

                    <div class="col-lg-6">
                        <?php foreach ($rowSkill as $key => $value) { ?>
                            <?php if ($key % 2 == 1) { ?>
                                <div class="progress">
                                    <span class="skill"><span><?php echo $value['name'] ?></span> <i class="val"><?php echo $value['rating'] ?>%</i></span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $value['rating'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
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
                <?php echo isset($rowResume['resume_tabel']) ? $rowResume['resume_tabel'] : '' ?>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="resume-title">Sumary</h3>

                        <div class="resume-item pb-0">
                            <h4><?php echo isset($rowResume['name_1']) ? $rowResume['name_1'] : '' ?></h4>
                            <?php echo isset($rowResume['resume_1']) ? $rowResume['resume_1'] : '' ?>
                            <ul>
                                <li><?php echo isset($rowResume['address']) ? $rowResume['address'] : '' ?></li>
                                <li><?php echo isset($rowResume['contact']) ? $rowResume['contact'] : '' ?></li>
                                <li><?php echo isset($rowResume['email']) ? $rowResume['email'] : '' ?></li>
                            </ul>
                        </div><!-- Edn Resume Item -->

                        <h3 class="resume-title">Education</h3>
                        <div class="resume-item">
                            <h4><?php echo isset($rowResume['title_1']) ? $rowResume['title_1'] : '' ?></h4>
                            <h5><?php echo isset($rowResume['tahun_1']) ? $rowResume['tahun_1'] : '' ?></h5>
                            <p><em><?php echo isset($rowResume['kampus']) ? $rowResume['kampus'] : '' ?></em></p>
                            <?php echo isset($rowResume['resume_2']) ? $rowResume['resume_2'] : '' ?>
                        </div><!-- Edn Resume Item -->
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="resume-title">Professional Experience</h3>
                        <div class="resume-item">
                            <h4><?php echo isset($rowResume['experience']) ? $rowResume['experience'] : '' ?></h4>
                            <h5><?php echo isset($rowResume['tahun_2']) ? $rowResume['tahun_2'] : '' ?></h5>
                            <p><em><?php echo isset($rowResume['address_2']) ? $rowResume['address_2'] : '' ?></em></p>
                            <ul>
                                <li><?php echo isset($rowResume['isi_1']) ? $rowResume['isi_1'] : '' ?></li>
                                <li><?php echo isset($rowResume['isi_2']) ? $rowResume['isi_2'] : '' ?></li>
                                <li><?php echo isset($rowResume['isi_3']) ? $rowResume['isi_3'] : '' ?></li>
                            </ul>
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
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <?php foreach ($rowCategories as $category) : ?>
                            <li data-filter=".filter-<?php echo $category['name'] ?>"><?php echo ucwords($category['name']) ?></li>

                        <?php endforeach; ?>
                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        <?php foreach ($rowPortofolios as $portofolio) : ?>
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?php echo $portofolio['name'] ?>">
                                <div class="portfolio-content h-100">
                                    <img src="admin/uploads/<?php echo $portofolio['photo']; ?>" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4><?php echo $portofolio['name_porto'] ?></h4>
                                        <p></p>
                                        <a href="admin/uploads/<?php echo $portofolio['photo']; ?>" title="<?php echo $portofolio['name_porto'] ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Portfolio Item -->
                        <?php endforeach; ?>

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Services</h2>

            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    <?php foreach ($rowServices as $key => $value) { ?>
                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon flex-shrink-0"><i class="<?php echo $value['icon'] ?>"></i></div>
                            <div>
                                <h4 class="title"><a href="service-details.html" class="stretched-link"><?php echo $value['title'] ?></a></h4>
                                <p class="description"><?php echo $value['description'] ?></p>
                            </div>
                        </div><!-- End Service Item -->
                    <?php } ?>

                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                        <div>
                            <h4 class="title"><a href="service-details.html" class="stretched-link">Informasi Harga</a></h4>
                            <?php echo isset($rowServices['description_3']) ? $rowServices['description_3'] : '' ?>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
                        <div>
                            <h4 class="title"><a href="service-details.html" class="stretched-link">Try & Error</a></h4>
                            <?php echo isset($rowServices['description_4']) ? $rowServices['description_4'] : '' ?>
                        </div>
                    </div><!-- End Service Item -->
                </div>
            </div>

        </section><!-- /Services Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <?php echo isset($rowTestimonial['description_testi']) ? $rowTestimonial['description_testi'] : '' ?>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 1,
                                    "spaceBetween": 40
                                },
                                "1200": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 1
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper">
                        <?php foreach ($rowTestimonials as $key => $rowTestimonial) { ?>
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <span><?php echo isset($rowTestimonial['description']) ? $rowTestimonial['description'] : '' ?></span>
                                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                    <h3><?php echo isset($rowTestimonial['name']) ? $rowTestimonial['name'] : '' ?></h3>
                                    <h4><?php echo isset($rowTestimonial['profession']) ? $rowTestimonial['profession'] : '' ?></h4>
                                </div>
                            </div><!-- End testimonial item -->
                        <?php } ?>



                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p>A108 Adam Street, New York, NY 535022</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Us</h3>
                                    <p>+1 5589 55488 55</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Us</h3>
                                    <p>info@example.com</p>
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
                <p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights Reserved</span></p>
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