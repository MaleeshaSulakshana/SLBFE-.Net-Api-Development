<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>job Online</title>

    <link rel="icon" href="../asserts/images/favicon.png">


    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,&amp;display=swap"
        rel="stylesheet">

        
    <link rel="stylesheet" href="../asserts/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asserts/css/line-awesome.css">
    <link rel="stylesheet" href="../asserts/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../asserts/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../asserts/css/magnific-popup.css">
    <link rel="stylesheet" href="../asserts/css/daterangepicker.css">
    <link rel="stylesheet" href="../asserts/css/jquery-ui.css">
    <link rel="stylesheet" href="../asserts/css/chosen.min.css">
    <link rel="stylesheet" href="../asserts/css/style.css">

    <script src="../asserts/js/sweetalert.js"></script>

</head>

<body>

    <div class="loader-container">
        <div class="loader-circle">
            <div class="loader">
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
            </div>
        </div>
    </div>
    
    <header class="header-area header-desktop">
        <div class="header-menu-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-full-width">
                            <div class="logo">
                                <a href="dashboard.php">
                                    <h3 class="widget-title pb-0">SLBFE</h3>
                                </a>
                            </div>

                            <div class="menu-toggler d-flex align-items-center">
                                <div class="side-menu-open">
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                </div>
                                <div class="user-menu-open">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="side-nav-container">
            <div class="humburger-menu">
                <div class="humburger-menu-lines side-menu-close"></div>
            </div>
            <div class="side-menu-wrap">

                <div class="side-nav-button">
                    <a href="login.php">Login</a>
                    <span class="or-text">or</span>
                    <a href="sign-up.php">Sign up</a>
                    <a href="employer-dashboard-post-job.php" class="theme-btn">Post a Job</a>
                </div>
            </div>
        </div>
        <div class="user-nav-container">
            <div class="humburger-menu">
                <div class="humburger-menu-lines side-menu-close"></div>
            </div>
            <div class="user-panel-nav">
                <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="notification-tab" data-toggle="tab" href="#notification-home"
                            role="tab" aria-controls="notification-home" aria-selected="true">
                            Notifications
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="message-tab" data-toggle="tab" href="#message-home" role="tab"
                            aria-controls="message-home" aria-selected="false">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-tab" data-toggle="tab" href="#account-home" role="tab"
                            aria-controls="account-home" aria-selected="false">Account</a>
                    </li>
                </ul>
            </div>
            <div class="user-panel-content">
                <div class="tab-content" id="tab-tabContent">
                    <div class="tab-pane fade show active" id="notification-home" role="tabpanel"
                        aria-labelledby="notification-tab">
                        <div class="user-sidebar-item">
                            <div class="mess-dropdown">
                                <div class="mess__body">
                                    <a href="#" class="d-block">
                                        <div class="mess__item">
                                            <div class="icon-element">
                                                <i class="la la-bolt"></i>
                                            </div>
                                            <div class="content">
                                                <p class="text">Your Resume Updated!</p>
                                                <span class="time">5 hours ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="#" class="d-block">
                                        <div class="mess__item">
                                            <div class="icon-element">
                                                <i class="la la-lock"></i>
                                            </div>
                                            <div class="content">
                                                <p class="text">You changed password</p>
                                                <span class="time">2 day ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="#" class="d-block">
                                        <div class="mess__item">
                                            <div class="icon-element">
                                                <i class="la la-check-circle"></i>
                                            </div>
                                            <div class="content">
                                                <p class="text">You applied for a job <span class="color-text">Front-end
                                                        Developer</span></p>
                                                <span class="time">1 day ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="#" class="d-block">
                                        <div class="mess__item">
                                            <div class="icon-element">
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="content">
                                                <p class="text">Your account has been created successfully</p>
                                                <span class="time">1 minute ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="#" class="d-block">
                                        <div class="mess__item">
                                            <div class="icon-element">
                                                <i class="la la-download"></i>
                                            </div>
                                            <div class="content">
                                                <p class="text">Someone downloaded resume</p>
                                                <span class="time">Yesterday</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="#" class="d-block">
                                        <div class="mess__item">
                                            <div class="icon-element">
                                                <i class="la la-check-circle"></i>
                                            </div>
                                            <div class="content">
                                                <p class="text">Application has been approved</p>
                                                <span class="time">1 hour ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="#" class="d-block">
                                        <div class="mess__item">
                                            <div class="icon-element">
                                                <i class="la la-flag"></i>
                                            </div>
                                            <div class="content">
                                                <p class="text">New report has been received</p>
                                                <span class="time">10 hours ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="#" class="d-block">
                                        <div class="mess__item">
                                            <div class="icon-element">
                                                <i class="la la-bell-o"></i>
                                            </div>
                                            <div class="content">
                                                <p class="text">New user feedback received</p>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                </div><!-- end mess__body -->
                            </div><!-- end mess-dropdown -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="message-home" role="tabpanel" aria-labelledby="message-tab">
                        <div class="user-sidebar-item">
                            <div class="mess-dropdown">
                                <div class="mess__body">
                                    <a href="employer-dashboard-message.php" class="d-block">
                                        <div class="mess__item">
                                            <div class="avatar dot-status">
                                                <img src="../asserts/images/small-team1.jpg" alt="Michelle Moreno">
                                            </div>
                                            <div class="content">
                                                <h4 class="widget-title">Michelle Moreno</h4>
                                                <p class="text">Thanks for reaching out. I'm quite busy right now on
                                                    many</p>
                                                <span class="time">5 min ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="employer-dashboard-message.php" class="d-block">
                                        <div class="mess__item">
                                            <div class="avatar dot-status online-status">
                                                <img src="../asserts/images/small-team2.jpg" alt="Michelle Moreno">
                                            </div>
                                            <div class="content">
                                                <h4 class="widget-title">Alex Smith</h4>
                                                <p class="text">Thanks for reaching out. I'm quite busy right now on
                                                    many</p>
                                                <span class="time">2 days ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="employer-dashboard-message.php" class="d-block">
                                        <div class="mess__item">
                                            <div class="avatar dot-status">
                                                <img src="../asserts/images/small-team1.jpg" alt="Michelle Moreno">
                                            </div>
                                            <div class="content">
                                                <h4 class="widget-title">Michelle Moreno</h4>
                                                <p class="text">Thanks for reaching out. I'm quite busy right now on
                                                    many</p>
                                                <span class="time">5 min ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="employer-dashboard-message.php" class="d-block">
                                        <div class="mess__item">
                                            <div class="avatar dot-status online-status">
                                                <img src="../asserts/images/small-team2.jpg" alt="Michelle Moreno">
                                            </div>
                                            <div class="content">
                                                <h4 class="widget-title">Alex Smith</h4>
                                                <p class="text">Thanks for reaching out. I'm quite busy right now on
                                                    many</p>
                                                <span class="time">2 days ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="employer-dashboard-message.php" class="d-block">
                                        <div class="mess__item">
                                            <div class="avatar dot-status">
                                                <img src="../asserts/images/small-team2.jpg" alt="Michelle Moreno">
                                            </div>
                                            <div class="content">
                                                <h4 class="widget-title">Alex Smith</h4>
                                                <p class="text">Thanks for reaching out. I'm quite busy right now on
                                                    many</p>
                                                <span class="time">2 days ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="employer-dashboard-message.php" class="d-block">
                                        <div class="mess__item">
                                            <div class="avatar dot-status">
                                                <img src="../asserts/images/small-team6.jpg" alt="Michelle Moreno">
                                            </div>
                                            <div class="content">
                                                <h4 class="widget-title">Michelle Moreno</h4>
                                                <p class="text">Thanks for reaching out. I'm quite busy right now on
                                                    many</p>
                                                <span class="time">5 min ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                    <a href="employer-dashboard-message.php" class="d-block">
                                        <div class="mess__item">
                                            <div class="avatar dot-status online-status">
                                                <img src="../asserts/images/small-team6.jpg" alt="Michelle Moreno">
                                            </div>
                                            <div class="content">
                                                <h4 class="widget-title">Kamran Adi</h4>
                                                <p class="text">Thanks for reaching out. I'm quite busy right now on
                                                    many</p>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </div><!-- end mess__item -->
                                    </a>
                                </div><!-- end mess__body -->
                            </div><!-- end mess-dropdown -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-home" role="tabpanel" aria-labelledby="account-tab">
                        <div class="user-action-wrap user-sidebar-panel">
                            <div class="mess-dropdown">
                                <div class="mess__title d-flex align-items-center">
                                    <div class="image dot-status online-status">
                                        <a href="#">
                                            <img src="../asserts/images/company-logo.jpg" alt="Bluetech, Inc">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4 class="widget-title">
                                            <a href="#">Bluetech, Inc</a>
                                        </h4>
                                        <span class="email">bluetechinc@example.com</span>
                                    </div>
                                </div><!-- end mess__title -->
                                <div class="mess__body">
                                    <a href="employer-dashboard.php" class="d-block">
                                        <i class="la la-user"></i> Account
                                    </a>
                                    <a href="employer-dashboard-bookmark.php" class="d-block">
                                        <i class="la la-bookmark"></i> Bookmarks
                                    </a>
                                    <a href="employer-dashboard.php" class="d-block">
                                        <i class="la la-plus"></i> Post a Job
                                    </a>
                                    <a href="employer-dashboard.php" class="d-block">
                                        <i class="la la-question"></i> Help
                                    </a>
                                    <a href="employer-dashboard.php" class="d-block">
                                        <i class="la la-gear"></i> Settings
                                    </a>
                                    <div class="section-block mt-2 mb-2"></div>
                                    <a href="index.php" class="d-block">
                                        <i class="la la-power-off"></i> Logout
                                    </a>
                                </div><!-- end mess__body -->
                            </div><!-- end mess-dropdown -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end user-nav-container -->
    </header>