<?php 
    include 'env.php';
    include 'partials/user/header.php';

    $url = $GLOBALS['BASE_URL']. "api/complain/citizen/".$_SESSION['nid'];

    
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


    if (isset($_POST['btnComplain'])) {
        addComplain();

    }

    function addComplain() {

        $complain =  $_REQUEST['complain'];
        
        if ($complain == "") {

            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Fields empty!."
          });
          </script>';

        } else {

            $data = array(
                "message" => $complain,
                "reply" => "",
                "date" => date("Y-m-d"),
                "citizenNid" => $_SESSION['nid']
            );

            $data_string = json_encode($data);
            $url = $GLOBALS['BASE_URL']. "api/complain";

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
    

            if ($status == 201)
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
                                <h2 class="sec__title mb-0">Complains</h2>
                            </div>
                            <ul class="list-items d-flex align-items-center">
                                <li class="active__list-item"><a href="index.php">Home</a></li>
                                <li>Complains</li>
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

                <form method="post" action="complains.php">

                    <div class="col-lg-12">
                        <div class="user-form-action">
                            <div class="billing-form-item">
                                <div class="billing-title-wrap">
                                    <h3 class="widget-title pb-0">Add your complain</h3>
                                    <div class="title-shape margin-top-10px"></div>
                                </div>
                                <div class="billing-content pb-3">
                                    <div class="contact-form-action">
                                            <div class="input-box">
                                                <label class="label-text">Complain</label>
                                                <div class="form-group">
                                                    <textarea
                                                        class="message-control form-control pt-3 pr-4 pb-3 pl-4" name="complain"></textarea>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-box">
                            <button class="theme-btn border-0" type="submit" name="btnComplain">Add</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

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
                                                    <h4 class="card-title mb-1"><?php echo $value['message']; ?></h4>
                                                    <p class="card-sub">
                                                        <span class="mr-2"><?php echo $value['reply']; ?></span>
                                                    </p>
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
        


    <?php
        include 'partials/user/footer.php'
    ?>