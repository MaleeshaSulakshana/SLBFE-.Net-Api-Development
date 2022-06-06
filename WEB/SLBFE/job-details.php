<?php 
    include 'env.php';
    include 'partials/user/header.php';

    $url = $GLOBALS['BASE_URL']. "api/job/".$_GET['id'];

    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json'
        )
    );          

    $response = curl_exec($curl);
    $response_data = json_decode($response, true);
    curl_close($curl);
    
    $data = $response_data;

?>


    <section class="breadcrumb-area job-single-breadcrumb">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">

                            <div class="bread-details d-flex align-items-center">
                                <div class="job-detail-content">
                                    <h2 class="widget-title font-size-30 text-white pb-1">
                                        <?php echo $data['title']; ?>
                                    </h2>
                                    <p class="font-size-16 mt-1 text-white">
                                        <span class="mr-2 mb-2 d-inline-block"><i
                                                class="la la-briefcase mr-1"></i><?php echo $data['company']; ?></span>
                                        <span class="mr-2 mb-2 d-inline-block"><i class="la la-map-marker mr-1"></i><?php echo $data['location']; ?></span>
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="form-shared">
    
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="user-form-action margin-top-35px">
                            
                            <h2 class="widget-title">Description:</h2>
                            <div class="title-shape"></div>
                            <p class="mt-3 mb-3">
                                <?php echo $data['description']; ?>
                            </p>
                        </div>

                        <div class="job-description padding-bottom-35px">
                            <h2 class="widget-title">Responsibilities:</h2>
                            <div class="title-shape"></div>
                            <p class="mt-3 mb-3">
                                <?php echo $data['responsibilities']; ?>
                            </p>
                        </div>

                        <div class="job-description padding-bottom-35px">
                            <h2 class="widget-title">Qualifications:</h2>
                            <div class="title-shape"></div>
                            <p class="mt-3 mb-3">
                                <?php echo $data['qualifications']; ?>
                            </p>
                        </div>

                        <div class="job-description padding-bottom-35px">
                            <h2 class="widget-title">Recommended skills</h2>
                            <div class="title-shape"></div>
                            <p class="mt-3 mb-3">
                                <?php echo $data['skills']; ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
        


    <?php
        include 'partials/user/footer.php'
    ?>