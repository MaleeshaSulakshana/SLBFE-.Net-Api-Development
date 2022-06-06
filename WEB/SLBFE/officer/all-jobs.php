<?php
    include '../env.php';
    include '../partials/officer/header.php';

    $url = $GLOBALS['BASE_URL']. "api/job";

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
                            <h2 class="sec__title">Jobs</h2>
                        </div>
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="index.php">Home</a></li>
                            <li>Jobs</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="billing-form-item">
                            <div class="billing-title-wrap">
                                <h3 class="widget-title pb-0">Jobs</h3>
                                <div class="title-shape margin-top-10px"></div>
                            </div>
                            <div class="billing-content pb-0">
                                <div class="manage-job-wrap">
                                    <div class="table-responsive">
                                        <table class="table">

                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Company</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                    if ($data != null) {
                                                        foreach ($data as $value) {
                                                ?>

                                                <tr>
                                                    <td><?php echo $value['jobId']; ?></td>
                                                    <td><?php echo $value['title']; ?></td>
                                                    <td><?php echo $value['company']; ?></td>
                                                    <td class="text-center"><button class="theme-btn border-0" 
                                                            onclick="view('<?php echo $value['jobId']; ?>')">View</button></td>
                                                </tr>
                                                
                                                <?php
                                                        }
                                                    }
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<script>
    function view($id) {
        document.location.href = 'view-job-details.php?id='+$id;
    }
</script>

<?php
    include '../partials/officer/footer.php';
?>