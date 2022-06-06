<?php 
    include 'env.php';
    include 'partials/user/header.php';

    if (isset($_POST['btnUpdate'])) {
        Update();

    }

    function Update() {

        $password = $_REQUEST['password'];
        $confirmpassword = $_REQUEST['confirmpassword'];
        
        if ($password == "" || $confirmpassword == "") 
        {
            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Fields empty!."
          });
          </script>';

        } else if ($password != $confirmpassword) {

            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Password and confirm password not matched!."
          });
          </script>';

        } else {

            $data = array(
                "password" => $password,
            );

            $data_string = json_encode($data);

            if ($_SESSION['type'] == 'citizen') {
                $url = $GLOBALS['BASE_URL']. "api/citizens/".$_SESSION['nid']."/psw";
            } else {
                $url = $GLOBALS['BASE_URL']. "api/company/".$_SESSION['nid']."/psw";
            }

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");                                                                     
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',
                "Authorization: Bearer ".$_SESSION['token'],
                'Content-Length: ' . strlen($data_string))                                                                       
            );          
        
            $response = curl_exec($curl);
            $response_data = json_decode($response, true);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);
    

            if ($status == 200)
            {
                $message = $response_data['message'];

                echo '<script type="text/javascript">
                    Swal.fire({
                    icon: "success",
                    title: "Success...",
                    text: "'.$message.'"
                  });
                  </script>';

            } else {

                echo '<script type="text/javascript">
                    Swal.fire({
                    icon: "warning",
                    title: "Oops...",
                    text: "'.$status.' Update Failed"
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
                                <h2 class="sec__title mb-0">Change Password</h2>
                            </div>
                            <ul class="list-items d-flex align-items-center">
                                <li class="active__list-item"><a href="index.php">Home</a></li>
                                <li>Change Password</li>
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

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="signup-nav" role="tabpanel"
                                aria-labelledby="signup-tab">
                                <div class="billing-form-item mb-0">

                                    <div class="billing-content">
                                        <div class="contact-form-action">
                                            <form method="POST" action="change-password.php">
                                            <div class="input-box mb-3">
                                                    <label class="label-text">Password</label>
                                                    <div class="form-group mb-0">
                                                        <input class="form-control password-field" type="password"
                                                            name="password" id="password" placeholder="Password">
                                                        <a href="javascript:void(0)" class="btn toggle-password"
                                                            title="Toggle show/hide password">
                                                            <i class="la la-eye eye-on"></i>
                                                            <i class="la la-eye-slash eye-off"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Confirm Password</label>
                                                    <div class="form-group">
                                                        <input class="form-control password-field" type="password"
                                                            name="confirmpassword" id="confirmpassword" placeholder="Confirm password">
                                                    </div>
                                                </div>

                                                <div class="btn-box margin-top-30px">
                                                    <button class="theme-btn border-0" type="submit" name="btnUpdate">Update
                                                        Password</button>
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