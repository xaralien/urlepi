<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UrLepi - Service Your Laptop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/'); ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <!-- <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>+012
                            345 6789</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>info@example.com</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-body ps-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="<?= base_url('home/'); ?>" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><img class=" me-2" src="<?= base_url('assets/'); ?>img/icon.png" style="object-fit: cover;">UrLepi</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="<?= base_url('home/'); ?>" class="nav-item nav-link <?php if ($this->uri->segment(1) == "home" && $this->uri->segment(2) == "") {
                                                                                            echo 'active';
                                                                                        } elseif ($this->uri->segment(1) == "" && $this->uri->segment(2) == "") {
                                                                                            echo 'active';
                                                                                        } ?>">Home</a>
                        <a href="<?= base_url('service/service');  ?> " class="nav-item nav-link <?php if ($this->uri->segment(2) == "service") {
                                                                                                        echo 'active';
                                                                                                    } ?>">Services</a>
                        <a href="<?= base_url('pesanan/');  ?> " class="nav-item nav-link <?php if ($this->uri->segment(2) == "service") {
                                                                                                echo 'active';
                                                                                            } ?>">Pesanan</a>

                        <!-- <a href="<?= base_url('harga/harga'); ?> " class="nav-item nav-link <?php if ($this->uri->segment(2) == "harga") {
                                                                                                        echo 'active';
                                                                                                    } ?>">Harga</a> -->
                        <a href="<?= base_url('home/registeradmin'); ?> " class="nav-item nav-link">Register</a>

                        <?php
                        if (!empty($this->session->userdata('email'))) { ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?= $user; ?></a>
                                <div class="dropdown-menu m-0">
                                    <a href="blog.html" class="dropdown-item">Profil</a>
                                    <a href="<?= base_url('pesanan/');  ?> " class="dropdown-item">Pesanan</a>
                                    <a href="team.html" class="dropdown-item">Pembelian</a>
                                    <a href="<?= base_url('member/logout'); ?>" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                        <?php } else {
                            $user = "guest"; ?>
                            <!-- <a class="nav-item nav-link" data-toggle="modal" data-target="#loginModal" href="#">Login</a> -->
                        <?php } ?>
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                <a href="detail.html" class="dropdown-item">Blog Detail</a>
                                <a href="team.html" class="dropdown-item">The Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="appointment.html" class="dropdown-item">Appointment</a>
                                <a href="search.html" class="dropdown-item">Search</a>
                            </div>
                        </div> -->
                        <a href="contact.html" class="nav-item nav-link <?php if ($this->uri->segment(2) == "Contact") {
                                                                            echo 'active';
                                                                        } ?>">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->