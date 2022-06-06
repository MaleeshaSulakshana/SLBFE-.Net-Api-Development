<?php

    include '../env.php';
    include '../partials/officer/header.php';

    if (isset($_POST['btnCreate'])) {
        create();

    }
        
    function create() {

        $title =  $_REQUEST['title'];
        $company =  $_REQUEST['company'];
        $location =  $_REQUEST['location'];
        $description =  $_REQUEST['description'];
        $qualifications =  $_REQUEST['qualifications'];
        $skills =  $_REQUEST['skills'];
        
        if ($title == "" || $company == "" || $location == "" || $description == "" || $qualifications == "" || $skills == "") {

            echo '<script type="text/javascript">
            Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Fields empty!."
          });
          </script>';

        } else {

            $data = array(
                "title" => $title,
                "company" => $company,
                "location" => $location,
                "description" => $description,
                "qualifications" => $qualifications,
                "skills" => $skills
            );

            $data_string = json_encode($data);
            $url = $GLOBALS['BASE_URL']. "api/job";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
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
                $url = 'all-jobs.php';
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
                            <h2 class="sec__title">Add Job</h2>
                        </div>
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="index.php">Home</a></li>
                            <li>Add Job</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="user-form-action">
                        <div class="billing-form-item">
                            <div class="billing-title-wrap">
                                <h3 class="widget-title pb-0">Add Job</h3>
                                <div class="title-shape margin-top-10px"></div>
                            </div>
                            <div class="billing-content">
                                <div class="contact-form-action">
                                    <form method="post" action="add-job.php">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Title</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="title" id="title"
                                                            placeholder="Title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Company Name</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="company" id="company"
                                                            placeholder="Company Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Location</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="location" id="location"
                                                            placeholder="Location">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Description</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="description" id="description"
                                                            placeholder="Description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Qualifications</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="qualifications" id="qualifications"
                                                            placeholder="Qualifications"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Skills</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="skills" id="skills"
                                                            placeholder="Skills"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn border-0" type="submit" name="btnCreate">Add</button>
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