<?php 
    include 'partials/user/header.php';
?>

    <section class="breadcrumb-area">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
                            <div class="section-heading">
                                <h2 class="sec__title mb-2">Contact us</h2>
                            </div><!-- end section-heading -->
                            <ul class="list-items d-flex align-items-center mt-2">
                                <li class="active__list-item"><a href="index.php">Home</a></li>
                                <li class="active__list-item">Pages</li>
                                <li>Contact us</li>
                            </ul>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
    </section><!-- end breadcrumb-area -->

    
    <section class="contact-area padding-top-100px padding-bottom-85px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading mb-5">
                        <h2 class="sec__title font-size-28 line-height-35">How can we help you today?</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
                <div class="col-lg-4">
                    <div class="icon-box">
                        <h4 class="info__title mb-3">Are you an employer?</h4>
                        <p class="info__desc">
                            If so, <a href="employer-dashboard-post-job.php" class="color-text">click here</a> to post
                            a job, ask questions about your account, or get support.
                        </p>
                    </div>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4">
                    <div class="icon-box">
                        <h4 class="info__title mb-3">Are you a candidate?</h4>
                        <p class="info__desc">
                            If so, <a href="candidate-add-resume.php" class="color-text">click here</a> to add resume,
                            ask questions about your account, or get support.
                        </p>
                    </div>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4">
                    <div class="icon-box">
                        <h4 class="info__title mb-3">Forgot your password?</h4>
                        <p class="info__desc">Don't worry, it happens to everyone <a href="recover.php"
                                class="color-text">Click here to reset your password</a></p>
                    </div>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4">
                    <div class="icon-box">
                        <h4 class="info__title mb-3">Want to stop getting our emails?</h4>
                        <p class="info__desc">We'll miss you, but you can <a href="#" class="color-text"> click here to
                                unsubscribe</a></p>
                    </div>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4">
                    <div class="icon-box">
                        <h4 class="info__title mb-3">Have lingering questions?</h4>
                        <p class="info__desc">Find answers in our <a href="faq.php" class="color-text">FAQ</a> page or
                            contact our
                            <a href="contact.php" class="color-text">help center</a>
                        </p>
                    </div>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4">
                    <div class="icon-box">
                        <h4 class="info__title mb-3">Media</h4>
                        <p class="info__desc">If you are a member of the media, please reach out to <a
                                href="mailto:info@Jobonline.com" class="color-text">info@jobonline.com</a></p>
                    </div>
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
            <div class="section-block margin-top-70px margin-bottom-100px"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-message mb-3" role="alert"></div>
                </div>
                <div class="col-lg-7">
                    <div class="billing-form-item">
                        <div class="billing-title-wrap">
                            <h3 class="widget-title pb-0">Use the form below to get in touch with us</h3>
                            <div class="title-shape margin-top-10px"></div>
                        </div><!-- billing-title-wrap -->
                        <div class="billing-content">
                            <div class="contact-form-action">
                                <form action="" class="contact-form">
                                    <div class="input-box">
                                        <label class="label-text">Full Name</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input id="name" class="form-control" type="text" name="name"
                                                placeholder="Full name">
                                        </div>
                                    </div><!-- end input-box -->
                                    <div class="input-box">
                                        <label class="label-text">Email</label>
                                        <div class="form-group">
                                            <span class="la la-envelope-o form-icon"></span>
                                            <input id="email" class="form-control" type="email" name="email"
                                                placeholder="Email address">
                                        </div>
                                    </div><!-- end input-box -->
                                    <div class="input-box">
                                        <label class="label-text">Phone</label>
                                        <div class="form-group">
                                            <span class="la la-phone form-icon"></span>
                                            <input id="phone" class="form-control" type="text" name="phone"
                                                placeholder="Phone number">
                                        </div>
                                    </div><!-- end input-box -->
                                    <div class="input-box">
                                        <label class="label-text">Reason for contact</label>
                                        <div class="form-group">
                                            <span class="la la-book form-icon"></span>
                                            <input id="subject" class="form-control" type="text" name="subject"
                                                placeholder="Subject">
                                        </div>
                                    </div><!-- end input-box -->
                                    <div class="input-box">
                                        <label class="label-text">Message</label>
                                        <div class="form-group">
                                            <span class="la la-pencil form-icon"></span>
                                            <textarea id="message" class="message-control form-control" name="message"
                                                placeholder="Write message"></textarea>
                                        </div>
                                    </div>
                                    <div class="btn-box">
                                        <button id="send-message-btn" type="submit" class="theme-btn border-0">Send
                                            Message</button>
                                    </div>
                                </form>
                            </div><!-- end contact-form-action -->
                        </div><!-- end billing-content -->
                    </div><!-- end billing-form-item -->
                </div><!-- end col-lg-7 -->
                <div class="col-lg-5">
                    <div class="contact-details margin-bottom-30px">
                        <div class="contact-details-inner">
                            <div class="contact-item d-flex align-items-center">
                                <div class="contact-icon mr-3">
                                    <i class="la la-map-marker icon-element font-size-24"></i>
                                </div>
                                <div class="contact-address">
                                    <h4 class="widget-title text-white pb-2">Address</h4>
                                    <p class="color-white-rgba font-weight-medium">Mada Center 8th floor, 379 Hudson St,
                                        New York, NY 10018 US</p>
                                </div>
                            </div>
                            <div class="contact-item d-flex align-items-center">
                                <div class="contact-icon mr-3">
                                    <i class="la la-phone icon-element font-size-24"></i>
                                </div>
                                <div class="contact-address">
                                    <h4 class="widget-title text-white pb-2">Lets Talk</h4>
                                    <p class="color-white-rgba font-weight-medium">+1 800 1236879</p>
                                    <p class="color-white-rgba font-weight-medium">+99 06 1234 566 88</p>
                                </div>
                            </div>
                            <div class="contact-item d-flex align-items-center">
                                <div class="contact-icon mr-3">
                                    <i class="la la-envelope icon-element font-size-24"></i>
                                </div>
                                <div class="contact-address">
                                    <h4 class="widget-title text-white pb-2">General Support</h4>
                                    <p class="color-white-rgba font-weight-medium"><a href="mailto:supportjob@gmail.com"
                                            class="color-white-rgba">supportjobonline@gmail.com</a></p>
                                    <p class="color-white-rgba font-weight-medium"><a href="mailto:contact@example.com"
                                            class="color-white-rgba">contact@example.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end contact-details -->
                    <div class="billing-form-item presentation-box">
                        <div class="billing-title-wrap">
                            <h3 class="widget-title">Need Presentation?</h3>
                            <div class="title-shape"></div>
                        </div>
                        <div class="billing-content">
                            <p>
                                You like what we do, but you need to demonstrate your team as well. Easy!
                                Directly download, or share the link to a PDF with your colleagues.
                            </p>
                            <a href="javascript:void(0)" class="border-0 color-text-2 mt-4 d-flex align-items-center"><i
                                    class="la la-download icon-element"></i> Company profile.pdf (6.3 MB)</a>
                        </div>
                    </div><!-- end billing-form-item -->
                    <div class="billing-form-item">
                        <div class="billing-title-wrap">
                            <h3 class="widget-title">Follow &amp; Connect</h3>
                            <div class="title-shape"></div>
                        </div>
                        <div class="billing-content">
                            <ul class="social-profile">
                                <li><a href="#"><i class="la la-facebook"></i></a></li>
                                <li><a href="#"><i class="la la-twitter"></i></a></li>
                                <li><a href="#"><i class="la la-instagram"></i></a></li>
                                <li><a href="#"><i class="la la-dribbble"></i></a></li>
                                <li><a href="#"><i class="la la-behance"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- end billing-form-item -->
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <!-- ================================
    END CONTACT AREA
================================= -->

    <div class="section-block"></div>

    <!-- ================================
    START LOCATION AREA
================================= -->
    <section class="location-area text-center padding-top-100px padding-bottom-80px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="sec__title">Offices Near You</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row margin-top-35px">
                <div class="col-lg-3 responsive-column">
                    <div class="icon-box">
                        <div class="icon-element">
                            <i class="la la-map"></i>
                            <span class="info-number">1</span>
                        </div><!-- end icon-element-->
                        <div class="info-content mt-4">
                            <h4 class="info__title mb-1"><a href="#" class="color-text-2">Corporate HQ</a></h4>
                            <h4 class="info__title font-size-14 font-weight-medium mb-3"><a href="#"
                                    class="color-text-2">North America</a></h4>
                            <ul class="list-items">
                                <li>
                                    <i class="la la-map-marker mr-1"></i>200 parkview Drive
                                    Suite 1100 Chicago IL 500
                                </li>
                                <li>
                                    <i class="la la-phone mr-1"></i>555-555-1234
                                </li>
                            </ul>
                        </div><!-- end info-content -->
                    </div><!-- end icon-box -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="icon-box">
                        <div class="icon-element">
                            <i class="la la-map"></i>
                            <span class="info-number">2</span>
                        </div><!-- end icon-element-->
                        <div class="info-content mt-4">
                            <h4 class="info__title mb-1"><a href="#" class="color-text-2">Technology Hub</a></h4>
                            <h4 class="info__title font-size-14 font-weight-medium mb-3"><a href="#"
                                    class="color-text-2">North America</a></h4>
                            <ul class="list-items">
                                <li>
                                    <i class="la la-map-marker mr-1"></i>7860 North Park Place
                                    Norcross, GA 3029
                                </li>
                                <li>
                                    <i class="la la-phone mr-1"></i>555-555-1234
                                </li>
                            </ul>
                        </div><!-- end info-content -->
                    </div><!-- end icon-box -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="icon-box">
                        <div class="icon-element">
                            <i class="la la-map"></i>
                            <span class="info-number">3</span>
                        </div><!-- end icon-element-->
                        <div class="info-content mt-4">
                            <h4 class="info__title mb-1"><a href="#" class="color-text-2">European HQ</a></h4>
                            <h4 class="info__title font-size-14 font-weight-medium mb-3"><a href="#"
                                    class="color-text-2">Europe</a></h4>
                            <ul class="list-items">
                                <li>
                                    <i class="la la-map-marker mr-1"></i>8860 North Park Place
                                    183 Marsh Wall, London
                                </li>
                                <li>
                                    <i class="la la-phone mr-1"></i>555-555-1234
                                </li>
                            </ul>
                        </div><!-- end info-content -->
                    </div><!-- end icon-box -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="icon-box">
                        <div class="icon-element">
                            <i class="la la-map"></i>
                            <span class="info-number">4</span>
                        </div><!-- end icon-element-->
                        <div class="info-content mt-4">
                            <h4 class="info__title mb-1"><a href="#" class="color-text-2">Technology Hub</a></h4>
                            <h4 class="info__title font-size-14 font-weight-medium mb-3"><a href="#"
                                    class="color-text-2">Asia Pacific</a></h4>
                            <ul class="list-items">
                                <li>
                                    <i class="la la-map-marker mr-1"></i>7860 North Park Place
                                    San Shanghai, China
                                </li>
                                <li>
                                    <i class="la la-phone mr-1"></i>555-555-1234
                                </li>
                            </ul>
                        </div><!-- end info-content -->
                    </div><!-- end icon-box -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end location-area -->
    
    
    
    <?php
        include 'partials/user/footer.php'
    ?>