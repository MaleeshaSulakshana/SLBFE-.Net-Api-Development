<?php 
    include 'env.php';
    include 'partials/user/header.php';

    $url = $GLOBALS['BASE_URL']. "api/citizens/".$_SESSION['nid'];
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

        $name = $_REQUEST['name'];
        $age = $_REQUEST['age'];
        $contacts = $_REQUEST['contacts'];
        $address = $_REQUEST['address'];
        $latitude = $_REQUEST['latitude'];
        $longitude = $_REQUEST['longitude'];
        $profession = $_REQUEST['profession'];
        $affiliation = $_REQUEST['affiliation'];
        $qualifications = $_REQUEST['qualifications'];
        
        if ($name == "" || $age == "" || $contacts == "" || $address == "" || $latitude == "" || $longitude == "" || $profession == "" || $affiliation == "" || $qualifications == "") 
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
                "name" => $name,
                "age" => $age,
                "contacts" => $contacts,
                "address" => $address,
                "latitude" => $latitude,
                "longitude" => $longitude,
                "profession" => $profession,
                "affiliation" => $affiliation,
                "qualifications" => $qualifications,
            );

            $data_string = json_encode($data);
            $url = $GLOBALS['BASE_URL']. "api/citizens/".$_SESSION['nid'];

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
                                            <form method="POST" action="citizen-account.php">
                                                <div class="input-box">
                                                    <label class="label-text">Name</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="name" id="name"
                                                            placeholder="Name" value="<?php echo $data['name']; ?>">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Email</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="email" id="email"
                                                            placeholder="Email" disabled value="<?php echo $data['email']; ?>">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">NIC</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="nic" id="nic"
                                                            placeholder="NIC" disabled value="<?php echo $data['nationalId']; ?>">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Age</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="age" id="age"
                                                            placeholder="Age" value="<?php echo $data['age']; ?>">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Contacts</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="contacts" id="contacts"
                                                            placeholder="Contacts" value="<?php echo $data['contacts']; ?>">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Address</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="address" id="address"
                                                            placeholder="Address"><?php echo $data['address']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Latitude</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="latitude" id="latitude"
                                                            placeholder="Latitude" value="<?php echo $data['latitude']; ?>">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Longitude</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="longitude" id="longitude"
                                                            placeholder="Longitude" value="<?php echo $data['longitude']; ?>">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Profession</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="profession" id="profession"
                                                            placeholder="Profession" value="<?php echo $data['profession']; ?>">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Affiliation</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="affiliation" id="affiliation"
                                                            placeholder="Affiliation"><?php echo $data['affiliation']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Qualifications</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="qualifications" id="qualifications"
                                                            placeholder="Qualifications"><?php echo $data['qualifications']; ?></textarea>
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