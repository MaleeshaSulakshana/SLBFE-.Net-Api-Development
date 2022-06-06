<?php 
    include 'env.php';
    include 'partials/user/header.php';

    $url = $GLOBALS['BASE_URL']. "api/citizens/";

    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',
        "Authorization: Bearer ".$_SESSION['token']
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
                                <h2 class="sec__title mb-0">Job Seekers</h2>
                            </div>
                            <ul class="list-items d-flex align-items-center">
                                <li class="active__list-item"><a href="index.php">Home</a></li>
                                <li>Job Seekers</li>
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
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="user-form-action">
                            <div class="related-job-post padding-top-40px">
                                <div class="job-content margin-top-35px">
                                        
                                    <?php
                                        foreach ($data as $value) {
                                    ?>

                                    <div class="job-card job-card-layout">
                                        <div class="job-card-details d-flex align-items-center justify-content-between">
                                            <div class="card-head d-flex align-items-center">
                                                <div class="company-title-box">
                                                    <h4 class="card-title mb-1"><?php echo $value['name']; ?></h4>
                                                    <p class="card-sub">
                                                        <span class="mr-2"><?php echo $value['email']; ?></span>
                                                        <span class="mr-2"><?php echo $value['contacts']; ?></span>
                                                        <br/>
                                                        <span class="mr-2"><?php echo $value['profession']; ?></span>
                                                    </p>
                                                    <button class="theme-btn border-0 mt-3" type="button" onclick="viewJob('<?php echo $value['nationalId']; ?>')">View</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
        
    <script>
        function viewJob($id) {
            document.location.href = 'seeker-details.php?id='+$id;
        }
    </script>


    <?php
        include 'partials/user/footer.php'
    ?>