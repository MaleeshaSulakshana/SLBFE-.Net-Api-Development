<?php

    include '../env.php';
    include '../partials/officer/header.php';

    $url = $GLOBALS['BASE_URL']. "api/citizens";
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',
        "Authorization: Bearer ".$_SESSION['token'],
        )
    );          

    $response = curl_exec($curl);
    $response_data = json_decode($response, true);
    curl_close($curl);
    
    $citizens_count = Count($response_data);


    $url = $GLOBALS['BASE_URL']. "api/company";
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',
        "Authorization: Bearer ".$_SESSION['token'],
        )
    );          

    $response = curl_exec($curl);
    $response_data = json_decode($response, true);
    curl_close($curl);
    
    $company_count = Count($response_data);


    $url = $GLOBALS['BASE_URL']. "api/officer";
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',
        "Authorization: Bearer ".$_SESSION['token'],
        )
    );          

    $response = curl_exec($curl);
    $response_data = json_decode($response, true);
    curl_close($curl);
    
    $officer_count = Count($response_data);


    $url = $GLOBALS['BASE_URL']. "api/complain";
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',
        "Authorization: Bearer ".$_SESSION['token'],
        )
    );          

    $response = curl_exec($curl);
    $response_data = json_decode($response, true);
    curl_close($curl);
    
    $complain_count = Count($response_data);

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
                                <h2 class="sec__title line-height-45">Welcome, SLBFE!</h2>
                            </div>
                            <ul class="list-items d-flex align-items-center">
                                <li class="active__list-item"><a href="index.html">Home</a></li>
                                <li>Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-3 column-lg-half responsive-column">
                        <div class="overview-item">
                            <div class="icon-box bg-1 mb-0 d-flex align-items-center">
                                <div class="info-content">
                                    <span class="info__count"><?php echo $citizens_count ?></span>
                                    <h4 class="info__title font-size-16 mt-2">Total Citizens</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 column-lg-half responsive-column">
                        <div class="overview-item">
                            <div class="icon-box bg-2 mb-0 d-flex align-items-center">
                                <div class="info-content">
                                    <span class="info__count"><?php echo $company_count ?></span>
                                    <h4 class="info__title font-size-16 mt-2">Total Companies</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 column-lg-half responsive-column">
                        <div class="overview-item">
                            <div class="icon-box bg-3 mb-0 d-flex align-items-center">
                                <div class="info-content">
                                    <span class="info__count"><?php echo $officer_count ?></span>
                                    <h4 class="info__title font-size-16 mt-2">Total Officers</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 column-lg-half responsive-column">
                        <div class="overview-item">
                            <div class="icon-box bg-4 mb-0 d-flex align-items-center">
                                <div class="info-content">
                                    <span class="info__count"><?php echo $complain_count ?></span>
                                    <h4 class="info__title font-size-16 mt-2">Total Complains</h4>
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