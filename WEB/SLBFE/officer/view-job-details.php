<?php
    include '../env.php';
    include '../partials/officer/header.php';

    $url = $GLOBALS['BASE_URL']. "api/job/".$_GET['id'];
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

        $url = $GLOBALS['BASE_URL']. "api/job/".$_GET['id'];
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
            $url = 'all-Jobs.php';
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
                            <h2 class="sec__title">Job Details</h2>
                        </div>
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="index.php">Home</a></li>
                            <li>Job Details</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="user-form-action">
                        <div class="billing-form-item">
                            <div class="billing-title-wrap">
                                <h3 class="widget-title pb-0">Job Details</h3>
                                <div class="title-shape margin-top-10px"></div>
                            </div>
                            <div class="billing-content">
                                <div class="contact-form-action">
                                    <form method="post" action="view-job-details.php">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Title</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="title" id="title"
                                                            placeholder="Title" value="<?php echo $data['title']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Company Name</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="company" id="company"
                                                            placeholder="Company Name" value="<?php echo $data['company']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Location</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="location" id="location"
                                                            placeholder="Location" value="<?php echo $data['location']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Description</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="description" id="description"
                                                            placeholder="Description" disabled><?php echo $data['description']; ?></textarea>
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
                                            <div class="col-lg-4">
                                                <div class="input-box">
                                                    <label class="label-text">Skills</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="skills" id="skills"
                                                            placeholder="Skills" disabled><?php echo $data['skills']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn border-0" type="submit" name="btnRemove">Remove</button>
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