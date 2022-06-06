<?php 
    include '../env.php';
    include 'partials/user/header.php';

    if (isset($_POST['btnCitizen'])) {
        Citizen();

    } else if (isset($_POST['btnCompany'])) {
        Company();
    }
        
    function Citizen() {

        $name =  $_REQUEST['name'];
        $email =  $_REQUEST['email'];
        $nic =  $_REQUEST['nic'];
        $age =  $_REQUEST['age'];
        $contacts =  $_REQUEST['contacts'];
        $address =  $_REQUEST['address'];
        $latitude =  $_REQUEST['latitude'];
        $longitude =  $_REQUEST['longitude'];
        $profession =  $_REQUEST['profession'];
        $affiliation =  $_REQUEST['affiliation'];
        $qualifications =  $_REQUEST['qualifications'];
        $password =  $_REQUEST['password'];
        $confirmpassword =  $_REQUEST['confirmpassword'];


        if ($name == "" || $email == "" || $nic == "" || $age == "" || $contacts == "" || $address == "" || $latitude == "" || $longitude == "" || $profession == "" || $affiliation == "" || $qualifications == "" || $password == "" || $confirmpassword == "") {

            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Fields empty!."
          });
          </script>';

        } else if ($password == $confirmpassword) {

            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Password and confirm password not matched!."
          });
          </script>';

        } else {

            $data = array(
                "name" => $name,
                "email" => $email,
                "nationalId" => $nic,
                "age" => $age,
                "contacts" => $contacts,
                "address" => $address,
                "latitude" => $latitude,
                "longitude" => $longitude,
                "profession" => $profession,
                "affiliation" => $affiliation,
                "qualifications" => $qualifications,
                "password" => $password,
                "birthCetificate" => "",
                "cv" => "",
                "passport" => ""
            );

            $data_string = json_encode($data);
            $url = $GLOBALS['BASE_URL']. "api/citizens";

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
                $url = 'all-officers.php';
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


    function Company() {

        $cname =  $_REQUEST['cname'];
        $cemail =  $_REQUEST['cemail'];
        $caddress =  $_REQUEST['caddress'];
        $csince =  $_REQUEST['csince'];
        $ccontact =  $_REQUEST['ccontact'];
        $cpassword =  $_REQUEST['cpassword'];
        $cconfirmpassword =  $_REQUEST['cconfirmpassword'];


        if ($cname == "" || $cemail == "" || $caddress == "" || $csince == "" || $ccontact == "" || $cpassword == "" || $cconfirmpassword == "") {

            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Fields empty!."
          });
          </script>';

        } else if ($cpassword == $cconfirmpassword) {

            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Password and confirm password not matched!."
          });
          </script>';

        } else {

            $data = array(
                "name" => $cname,
                "email" => $cemail,
                "address" => $caddress,
                "since" => $csince,
                "contact" => $ccontact,
                "password" => $cpassword
            );

            $data_string = json_encode($data);
            $url = $GLOBALS['BASE_URL']. "api/company";

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
                $url = 'all-officers.php';
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
                                <h2 class="sec__title mb-0">Sign Up</h2>
                            </div>
                            <ul class="list-items d-flex align-items-center">
                                <li class="active__list-item"><a href="index.php">Home</a></li>
                                <li>Sign Up</li>
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
                                    <a class="nav-link theme-btn active" id="signup-tab" data-toggle="tab"
                                        href="#signup-nav" role="tab" aria-controls="signup-nav" aria-selected="false">
                                        <i class="la la-user"></i> Register Personal Account
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link theme-btn" id="login-tab" data-toggle="tab" href="#login-nav"
                                        role="tab" aria-controls="login-nav" aria-selected="true">
                                        <i class="la la-sign-in"></i> Register Company Account
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="signup-nav" role="tabpanel"
                                aria-labelledby="signup-tab">
                                <div class="billing-form-item mb-0">
                                    <div class="billing-title-wrap border-bottom-0 text-center">
                                        <h3 class="widget-title font-size-28 pb-2">Create Your Personal Account!</h3>
                                        <p>
                                            <strong class="color-text-2 font-weight-medium">Already have an account? <a
                                                    href="login.php" class="color-text">Sign In</a></strong>
                                        </p>
                                    </div>
                                    <div class="billing-content">
                                        <div class="contact-form-action">
                                            <form method="POST" action="sign-up.php">
                                                <div class="input-box">
                                                    <label class="label-text">Name</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="name" id="name"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Email</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="email" id="email"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">NIC</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="nic" id="nic"
                                                            placeholder="NIC">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Age</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="age" id="age"
                                                            placeholder="Age">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Contacts</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="contacts" id="contacts"
                                                            placeholder="Contacts">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Address</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="address" id="address"
                                                            placeholder="Address"></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Latitude</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="latitude" id="latitude"
                                                            placeholder="Latitude">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Longitude</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="longitude" id="longitude"
                                                            placeholder="Longitude">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Profession</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="profession" id="profession"
                                                            placeholder="Profession">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Affiliation</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="affiliation" id="affiliation"
                                                            placeholder="Affiliation"></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Qualifications</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="qualifications" id="qualifications"
                                                            placeholder="Qualifications"></textarea>
                                                    </div>
                                                </div>
                                                
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
                                                    <button class="theme-btn border-0" type="submit" name="btnCitizen">Create
                                                        Account</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="tab-pane fade" id="login-nav" role="tabpanel" aria-labelledby="login-tab">
                                <div class="billing-form-item mb-0">
                                    <div class="billing-title-wrap border-bottom-0 text-center">
                                        <h3 class="widget-title font-size-28 pb-2">Create Company Account!</h3>
                                        <p>
                                            <strong class="color-text-2 font-weight-medium">Already have an account? <a
                                                    href="login.php" class="color-text">Sign In</a></strong>
                                        </p>
                                    </div>
                                    <div class="billing-content">
                                        <div class="contact-form-action">
                                            <form method="POST" action="sign-up.php" >
                                                <div class="input-box">
                                                    <label class="label-text">Company Name</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="cname" id="cname"
                                                            placeholder="Company Name">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Company Email</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="cemail" id="cemail"
                                                            placeholder="Company Email">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Company Address</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="caddress" id="caddress"
                                                            placeholder="Company Address"></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Since of Company</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="csince" id="csince"
                                                            placeholder="Since of Company">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Company Contact</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="ccontact" id="ccontact"
                                                            placeholder="Company Contact">
                                                    </div>
                                                </div>
                                                <div class="input-box mb-3">
                                                    <label class="label-text">Password</label>
                                                    <div class="form-group mb-0">
                                                        <input class="form-control password-field" type="password"
                                                            name="cpassword" id="cpassword" placeholder="Password">
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
                                                            name="cconfirmpassword" id="cconfirmpassword" placeholder="Confirm password">
                                                    </div>
                                                </div>
                                                
                                                <div class="btn-box margin-top-30px">
                                                    <button class="theme-btn border-0" type="submit" name="btnCompany">Create
                                                        Account</button>
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