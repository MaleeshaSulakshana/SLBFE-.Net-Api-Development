<?php 
    include 'env.php';
    include 'partials/user/header.php';

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

?>
    
    <section class="breadcrumb-area">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
                            <div class="section-heading">
                                <h2 class="sec__title mb-0">Seeker Details</h2>
                            </div>
                            <ul class="list-items d-flex align-items-center">
                                <li class="active__list-item"><a href="index.php">Home</a></li>
                                <li>Seeker Details</li>
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
                                                            placeholder="Name" value="<?php echo $data['name']; ?>" disabled>
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
                                                            placeholder="Age" value="<?php echo $data['age']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Contacts</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="contacts" id="contacts"
                                                            placeholder="Contacts" value="<?php echo $data['contacts']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Address</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="address" id="address"
                                                            placeholder="Address" disabled><?php echo $data['address']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Latitude</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="latitude" id="latitude"
                                                            placeholder="Latitude" value="<?php echo $data['latitude']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Longitude</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="longitude" id="longitude"
                                                            placeholder="Longitude" value="<?php echo $data['longitude']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Profession</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="profession" id="profession"
                                                            placeholder="Profession" value="<?php echo $data['profession']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Affiliation</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="affiliation" id="affiliation"
                                                            placeholder="Affiliation" disabled><?php echo $data['affiliation']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Qualifications</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="qualifications" id="qualifications"
                                                            placeholder="Qualifications" disabled><?php echo $data['qualifications']; ?></textarea>
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