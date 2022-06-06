<?php
    include '../env.php';
    include '../partials/officer/header.php';

    $url = $GLOBALS['BASE_URL']. "api/citizens/".$_GET['id'];
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


    if (isset($_POST['btnRemove'])) {
        Remove();

    }


    function Remove() {

        $url = $GLOBALS['BASE_URL']. "api/citizens/".$_GET['id'];
        $authorization = "Authorization: Bearer ".$_SESSION['token'];
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");                                                                  
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',
            $authorization
            )
        );          

        $response = curl_exec($curl);
        $response_data = json_decode($response, true);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);


        if ($status == 200)
        {
            $url = 'all-citizens.php';
            echo '<script>window.location.href="'.$url.'"</script>';

        } else {

            echo '<script type="text/javascript">
                Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "'.$status.' Failed"
              });
              </script>';

        }

    }

?>

<section class="dashboard-area">
    
    <?php
        include '../partials/officer/side-menu.php';
    ?>
    
    <div class="dashboard-content-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
                        <div class="section-heading">
                            <h2 class="sec__title">View Citizen</h2>
                        </div>
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="index.php">Home</a></li>
                            <li>View Citizen</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="user-form-action">
                        <div class="billing-form-item">
                            <div class="billing-title-wrap">
                                <h3 class="widget-title pb-0">View Citizen</h3>
                                <div class="title-shape margin-top-10px"></div>
                            </div>
                            <div class="billing-content">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Citizen Id</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="id" id="id"
                                                            placeholder="Citizen Id" value="<?php echo $data['userId']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">NIC</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="nic" id="nic"
                                                            placeholder="NIC" value="<?php echo $data['nationalId']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Name</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="name" id="name"
                                                            placeholder="Name" value="<?php echo $data['name']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Age</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="age" id="age"
                                                            placeholder="Age" value="<?php echo $data['age']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Address</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="address" id="address"
                                                            placeholder="Address" value="<?php echo $data['address']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Email</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="email" id="email"
                                                            placeholder="Email" value="<?php echo $data['email']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Contacts</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="contacts" id="contacts"
                                                            placeholder="Contacts" value="<?php echo $data['contacts']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Latitude</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="latitude" id="latitude"
                                                            placeholder="Latitude" value="<?php echo $data['latitude']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Longitude</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="longitude" id="longitude"
                                                            placeholder="Longitude" value="<?php echo $data['longitude']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Affiliation</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="affiliation" id="affiliation"
                                                            placeholder="Affiliation" disabled><?php echo $data['affiliation']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Qualifications</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="qualifications" id="qualifications"
                                                            placeholder="Qualifications" disabled><?php echo $data['qualifications']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn border-0">Birth Certificate</button>
                                                    <button class="theme-btn border-0">CV</button>
                                                    <button class="theme-btn border-0">Passport</button>
                                                    <button class="theme-btn border-0" name="btnRemove">Deactivate Account</button>
                                                </div>
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
</section>

<?php
    include '../partials/officer/footer.php';
?>