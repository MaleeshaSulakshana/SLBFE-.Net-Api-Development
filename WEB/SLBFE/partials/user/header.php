<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Online</title>
    <!-- Favicon -->
    <link rel="icon" href="asserts/images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,900&amp;display=swap"
        rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="asserts/css/bootstrap.min.css">
    <link rel="stylesheet" href="asserts/css/line-awesome.css">
    <link rel="stylesheet" href="asserts/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asserts/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asserts/css/magnific-popup.css">
    <link rel="stylesheet" href="asserts/css/daterangepicker.css">
    <link rel="stylesheet" href="asserts/css/jquery-ui.css">
    <link rel="stylesheet" href="asserts/css/chosen.min.css">
    <link rel="stylesheet" href="asserts/css/style.css">

    <script src="asserts/js/sweetalert.js"></script>
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

    <header class="header-area header-area-2">
        <div class="header-menu-wrapper padding-right-40px padding-left-40px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-full-width">
                            <div class="logo">
                                <a href="index.php"><img src="asserts/images/logo.png" alt="logo"></a>
                            </div><!-- end logo -->
                            <div class="main-menu-content ml-5">
                                <nav>
                                    <ul>
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div><!-- end main-menu-content -->
                            <div class="logo-right-content ml-auto">
                                <ul class="author-access-list">


                                <?php
                                    
                                    if (isset($_SESSION['type']) && isset($_SESSION['token']) && isset($_SESSION['nid']))
                                    {
                                    $user_type = $_SESSION['type'];
                                
                                    if ($user_type == "citizen")
                                    {
                                        ?>
                                        
                                        <li>
                                            <a href="jobs.php">Jobs</a>
                                        </li>

                                        <li>
                                            <a href="complains.php">Complains</a>
                                        </li>
                                        <li>
                                            <a href="citizen-account.php">Account</a>
                                        </li>

                                        <?php
                                    }
                                
                                    else if ($user_type == "company")
                                    {
                                        ?>
                                    
                                        <li>
                                            <a href="seekers.php">Job Seekers</a>
                                        </li>
                                        <li>
                                            <a href="company-account.php">Account</a>
                                        </li>
                                            
                                        <?php
                                    }

                                    ?>
                                    
                                    <li>
                                        <a href="change-password.php">Change Password</a>
                                    </li>
                                    <li>
                                        <a href="logout.php" class="theme-btn" nam="logout">
                                            Logout
                                        </a>
                                    </li>
                                    
                                    <?php
                                
                                    } else {
                                
                                        ?>
                                        
                                        <li>
                                            <a href="login.php">Login</a>
                                        </li>
                                        <li>
                                            <a href="sign-up.php">Sign up</a>
                                        </li>
                                        
                                        <?php
                                
                                    }

                                ?>
                                    
                                </ul>
                                <div class="side-menu-open">
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                </div><!-- end side-menu-open -->
                            </div><!-- end logo-right-content -->
                        </div><!-- end menu-full-width -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end header-menu-wrapper -->
        <div class="side-nav-container">
            <div class="humburger-menu">
                <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
            </div><!-- end humburger-menu -->
            <div class="side-menu-wrap">
                <ul class="side-menu-ul">
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <div class="side-nav-button">
                    <a href="login.php">Login</a>
                    <span class="or-text">or</span>
                    <a href="sign-up.php">Sign up</a>
                    <a href="employer-dashboard-post-job.php" class="theme-btn">Post a Job</a>
                </div><!-- end side-nav-button -->
            </div><!-- end side-menu-wrap -->
        </div><!-- end side-nav-container -->
    </header>