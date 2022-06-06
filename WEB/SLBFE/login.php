<?php 
    include 'env.php';
    include 'partials/user/header.php';

    if (isset($_POST['btnCitizen'])) {
        citizenLogin();

    } else if (isset($_POST['btnCompany'])) {
        companyLogin();

    } else if (isset($_POST['btnOfficer'])) {
        officerLogin();

    }
        
    function citizenLogin() {

        $email =  $_REQUEST['email'];
        $psw =  $_REQUEST['password'];
        
        if ($email == "" || $psw == "") {

            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Fields empty!."
          });
          </script>';

        } else {

            $data = array(
                "email" => $email,
                "password" => $psw
            );

            $data_string = json_encode($data);
            $url = $GLOBALS['BASE_URL']. "api/auth/login/citizen";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string))                                                                       
            );          
        
            $response = curl_exec($curl);
            $response_data = json_decode($response, true);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);
    

            if ($status == 200)
            {
                $type = $response_data['type'];
                $token = $response_data['token'];
                $nid = $response_data['nid'];

                $_SESSION["type"] = $type;
                $_SESSION["token"] = $token;
                $_SESSION["nid"] = $nid;

                $url = 'index.php';
                echo '<script>window.location.href="'.$url.'"</script>';

            } else {

                echo '<script type="text/javascript">
                    Swal.fire({
                    icon: "warning",
                    title: "Oops...",
                    text: "'.$status.' Authentication Failed"
                  });
                  </script>';

            }

        }
            
    }

    function companyLogin() {

        $cemail =  $_REQUEST['cemail'];
        $cpsw =  $_REQUEST['cpassword'];
        
        if ($cemail == "" || $cpsw == "") {

            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Fields empty!."
          });
          </script>';

        } else {

            $data = array(
                "email" => $cemail,
                "password" => $cpsw
            );

            $data_string = json_encode($data);
            $url = $GLOBALS['BASE_URL']. "api/auth/login/company";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string))                                                                       
            );          
        
            $response = curl_exec($curl);
            $response_data = json_decode($response, true);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);
    

            if ($status == 200)
            {
                $type = $response_data['type'];
                $token = $response_data['token'];
                $nid = $response_data['nid'];

                $_SESSION["type"] = $type;
                $_SESSION["token"] = $token;
                $_SESSION["nid"] = $nid;

                $url = 'index.php';
                echo '<script>window.location.href="'.$url.'"</script>';
                
            } else {

                echo '<script type="text/javascript">
                    Swal.fire({
                    icon: "warning",
                    title: "Oops...",
                    text: "'.$status.' Authentication Failed"
                  });
                  </script>';

            }

        }

    }

    function officerLogin() {

        $oemail =  $_REQUEST['oemail'];
        $opsw =  $_REQUEST['opassword'];
        
        if ($oemail == "" || $opsw == "") {

            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Fields empty!."
          });
          </script>';

        } else {

            $data = array(
                "email" => $oemail,
                "password" => $opsw
            );

            $data_string = json_encode($data);
            $url = $GLOBALS['BASE_URL']. "api/auth/login/officer";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string))                                                                       
            );          
        
            $response = curl_exec($curl);
            $response_data = json_decode($response, true);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);
    

            if ($status == 200)
            {
                $type = $response_data['type'];
                $token = $response_data['token'];
                $nid = $response_data['nid'];

                $_SESSION["type"] = $type;
                $_SESSION["token"] = $token;
                $_SESSION["nid"] = $nid;

                $url = 'officer/index.php';
                echo '<script>window.location.href="'.$url.'"</script>';

            } else {

                echo '<script type="text/javascript">
                    Swal.fire({
                    icon: "warning",
                    title: "Oops...",
                    text: "'.$status.' Authentication Failed"
                  });
                  </script>';

            }

        }

    }

?>

    <section class="breadcrumb-area">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
                            <div class="section-heading">
                                <h2 class="sec__title mb-0">Login</h2>
                            </div>
                            <ul class="list-items d-flex align-items-center">
                                <li class="active__list-item"><a href="index.php">Home</a></li>
                                <li class="active__list-item">Pages</li>
                                <li>Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="form-shared padding-top-100px padding-bottom-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="user-action-form">
                        <div class="tab-shared tab-shared-3">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link theme-btn active" id="login-tab" data-toggle="tab"
                                        href="#login-nav" role="tab" aria-controls="login-nav" aria-selected="true">
                                        <i class="la la-sign-in"></i> Login to Personal Account
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link theme-btn" id="company-tab" data-toggle="tab" href="#company-nav"
                                        role="tab" aria-controls="company-nav" aria-selected="false">
                                        <i class="la la-user"></i> Login to Company Account
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link theme-btn" id="officer-tab" data-toggle="tab" href="#officer-nav"
                                        role="tab" aria-controls="officer-nav" aria-selected="false">
                                        <i class="la la-user"></i> Login to Officer Account
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="login-nav" role="tabpanel"
                                aria-labelledby="login-tab">
                                <div class="billing-form-item mb-0">
                                    <div class="billing-title-wrap border-bottom-0 text-center">
                                        <h3 class="widget-title font-size-28 pb-2">Login to Your Personal Account</h3>
                                    </div>
                                    <div class="billing-content">
                                        <div class="contact-form-action">
                                            <form method="post" action="login.php">
                                                <div class="row">
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <label class="label-text">Email Address</label>
                                                            <div class="form-group">
                                                                <i class="la la-user form-icon"></i>
                                                                <input class="form-control" type="email" name="email" id="email"
                                                                    placeholder="Your email address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <label class="label-text">Password</label>
                                                            <div class="form-group">
                                                                <i class="la la-lock form-icon"></i>
                                                                <input class="form-control password-field"
                                                                    type="password" name="password" id="password"
                                                                    placeholder="Password">
                                                                <a href="javascript:void(0)" class="btn toggle-password"
                                                                    title="Toggle show/hide password">
                                                                    <i class="la la-eye eye-on"></i>
                                                                    <i class="la la-eye-slash eye-off"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="btn-box margin-top-20px margin-bottom-10px">
                                                            <button class="theme-btn border-0" type="submit" name="btnCitizen">Login
                                                                Account</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>Don't have an account? <a href="sign-up.php"
                                                                class="color-text"> Create Account</a></p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="company-nav" role="tabpanel" aria-labelledby="company-tab">
                                <div class="billing-form-item mb-0">
                                    <div class="billing-title-wrap border-bottom-0 text-center">
                                        <h3 class="widget-title font-size-28 pb-2">Login to Company Account</h3>
                                    </div>
                                    <div class="billing-content">
                                        <div class="contact-form-action">
                                            <form method="post">
                                                <div class="row">
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <label class="label-text">Email Address</label>
                                                            <div class="form-group">
                                                                <i class="la la-user form-icon"></i>
                                                                <input class="form-control" type="email" name="cemail" id="cemail"
                                                                    placeholder="Your email address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <label class="label-text">Password</label>
                                                            <div class="form-group">
                                                                <i class="la la-lock form-icon"></i>
                                                                <input class="form-control password-field"
                                                                    type="password" name="cpassword" id="cpassword"
                                                                    placeholder="Password">
                                                                <a href="javascript:void(0)" class="btn toggle-password"
                                                                    title="Toggle show/hide password">
                                                                    <i class="la la-eye eye-on"></i>
                                                                    <i class="la la-eye-slash eye-off"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="btn-box margin-top-20px margin-bottom-10px">
                                                            <button class="theme-btn border-0" type="submit" name="btnCompany">Login
                                                                Account</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>Don't have an account? <a href="sign-up.php"
                                                                class="color-text"> Create Account</a></p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="officer-nav" role="tabpanel" aria-labelledby="officer-tab">
                                <div class="billing-form-item mb-0">
                                    <div class="billing-title-wrap border-bottom-0 text-center">
                                        <h3 class="widget-title font-size-28 pb-2">Login to Officer Account</h3>
                                    </div>
                                    <div class="billing-content">
                                        <div class="contact-form-action">
                                            <form method="post">
                                                <div class="row">
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <label class="label-text">Email Address</label>
                                                            <div class="form-group">
                                                                <i class="la la-user form-icon"></i>
                                                                <input class="form-control" type="email" name="oemail" id="oemail"
                                                                    placeholder="Your email address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <label class="label-text">Password</label>
                                                            <div class="form-group">
                                                                <i class="la la-lock form-icon"></i>
                                                                <input class="form-control password-field"
                                                                    type="password" name="opassword" id="opassword"
                                                                    placeholder="Password">
                                                                <a href="javascript:void(0)" class="btn toggle-password"
                                                                    title="Toggle show/hide password">
                                                                    <i class="la la-eye eye-on"></i>
                                                                    <i class="la la-eye-slash eye-off"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="btn-box margin-top-20px margin-bottom-10px">
                                                            <button class="theme-btn border-0" type="submit" name="btnOfficer">Login
                                                                Account</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>Don't have an account? Contact Officers</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    
    
    
    <?php
        include 'partials/user/footer.php'
    ?>