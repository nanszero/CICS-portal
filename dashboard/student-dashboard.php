<?php
$sql=mysqli_query($con,"SELECT * FROM school_settings");
while($row=mysqli_fetch_array($sql))
{
    $mission = $row['mission'];
    $vision = $row['vision'];
    $core_values = $row['core_values'];
    $goals = $row['goals'];
    $president_logo = $row['president_logo'];
    $presiden_name = $row['presiden_name'];
}

?>
<div class="row mt--2">
    <div class="col-md-12">
        <div class="card full-height">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card-title"><b>Mission</b></div>
                        <?= $mission?>
                        <br>

                        <div class="card-title mt-4 mb--5"><b>Vision</b></div>
                        <?= $vision?>
                        <br>

                        <div class="card-title mt-4 mb--5"><b>Core Values</b></div>
                        <?= $core_values?>
                        <br>

                        <div class="card-title mt-4 mb--5"><b>Goals</b></div>
                        <?= $goals?>
                    </div>
                    <div class="col-md-3" align="center">
                        <img src="pictures/president-image/<?= $president_logo?>" alt="..." style="width: 80%">
                        <br>
                        <br>
                        <h3><b><?= $presiden_name?></b></h3>
                        <small>University President</small>
                    </div>
                </div>

                <div class="row">
                    <hr>
                </div>

                <div class="row">
                        <hr><br>
                        <!-- //CAROUSEL -->
                        <div class="col-md-12">
                            <hr>
                            <div class="card-title mb-3"><b>School Announcements</b></div>
                        </div>
                        <?php
                        $result = mysqli_query($con,"SELECT * FROM announcement ");
                        if($result -> num_rows > 0){
                            while($row = $result -> fetch_assoc()){
                                ?>
                                <div class="col-md-12">
                                    <div class="jumbotron">
                                        <h4><b><?= $row['name']?></b></h3>
                                        <p><b>Date:</b> <?= $row['date']?> </p>
                                        <p><?= $row[description]?></p>
                                        <img src="pictures/announcements/<?= $row['pic']?>" style="width:100%" alt="">
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>