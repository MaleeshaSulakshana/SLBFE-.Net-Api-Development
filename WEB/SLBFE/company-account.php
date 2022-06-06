<?php 
    include 'env.php';
    include 'partials/user/header.php';

    $url = $GLOBALS['BASE_URL']. "api/company/".$_SESSION['nid'];
    $authorization = "Authorization: Bearer ".$_SESSION['token'];
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',
        $authorization
        )
    );          

    $response = curl_exec($curl);
    $response_data = json_decode($response, true);
    curl_close($curl);

    $data = $response_data;

    if (isset($_POST['btnUpdate'])) {
        Update();

    }

    function Update() {

        $cname = $_REQUEST['cname'];
        $caddress = $_REQUEST['caddress'];
        $csince = $_REQUEST['csince'];
        $ccontact = $_REQUEST['ccontact'];
        
        if ($cname == "" || $caddress == "" || $csince == "" || $ccontact == "") 
        {
            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Fields empty!."
          });
          </script>';

        } else {

            $data = array(
                "name" => $cname,
                "address" => $caddress,
                "since" => $csince,
                "contact" => $ccontact
            );

            $data_string = json_encode($data);
            $url = $GLOBALS['BASE_URL']. "api/company/".$_SESSION['nid'];

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
                                <h2 class="sec__title mb-0">Account</h2>
                            </div>
                            <ul class="list-items d-flex align-items-center">
                                <li class="active__list-item"><a href="index.php">Home</a></li>
                                <li>Account</li>
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
                                        <form method="POST" action="company-account.php">
                                                <div class="input-box">
                                                    <label class="label-text">Company Name</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="cname" id="cname"
                                                            placeholder="Company Name" value="<?php echo $data['name']; ?>">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Company Email</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="cemail" id="cemail"
                                                            placeholder="Company Email" value="<?php echo $data['name']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Company Address</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="caddress" id="caddress"
                                                            placeholder="Company Address"><?php echo $data['name']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Since of Company</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="csince" id="csince"
                                                            placeholder="Since of Company" value="<?php echo $data['since']; ?>">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Company Contact</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="ccontact" id="ccontact"
                                                            placeholder="Company Contact" value="<?php echo $data['contact']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="btn-box margin-top-30px">
                                                    <button class="theme-btn border-0" type="submit" name="btnUpdate">Update
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