<?php
    include '../env.php';
    include '../partials/officer/header.php';

    $url = $GLOBALS['BASE_URL']. "api/citizens/".$_GET['id']."/contacts";
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

    $data = $response_data;

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
                            <h2 class="sec__title">View Citizen Contact</h2>
                        </div>
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="index.php">Home</a></li>
                            <li>View Citizen Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="user-form-action">
                        <div class="billing-form-item">
                            <div class="billing-title-wrap">
                                <h3 class="widget-title pb-0">View Citizen Contact</h3>
                                <div class="title-shape margin-top-10px"></div>
                            </div>
                            <div class="billing-content">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <div class="row">
                                            
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Contacts</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="contacts" id="contacts"
                                                            placeholder="Contacts" value="<?php echo $response; ?>" disabled>
                                                    </div>
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