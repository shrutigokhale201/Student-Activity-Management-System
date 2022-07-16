
<?php
//include header part of html
 include('header.php')
  ?>
            

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 jumbotron">
                            <h2 style="text-align: center;">
                               STUDENT ACTIVITY MANAGEMENT SYSTEM
                                <span style="float: right;"><a href="login.php" class="btn btn-info btn-lg">Admin Login</a></span>
                            </h2>
                    </div>
                </div>
            </div>

            <div class="student-info text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 jumbotron">
                            <h2>Student's Activity Information</h2>
                            <form action="index.php" method="post">
                <input type="text" name="roll" placeholder="Enter Roll" style="width: 240px;height: 35px;"><span>OR/AND<span>
                 <select name="activity" class="btn btn-info" >
                                    <option>SELECT Activity</option>
                                    <option>Hackathon</option>
                                    <option>Sports</option>
                                    <option>Technical Event</option>
                                    <option>Shivaji Event</option>
                                    <option>Ganpati Event</option>
                                    <option>Gathering</option>
                                    
                                </select>
                  <input type="submit" name="show" value="SHOW INFO" class="btn btn-success text-center" style="margin-left: 30px;" >  
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<table class="table table-striped table-bordered table-responsive text-center">
    <tr >
        <th class="text-center">Roll No.</th>
        <th class="text-center">Year</th>
        <th class="text-center">Full Name</th>
        <th class="text-center">Department</th>
        <th class="text-center">Activity</th>
        <th class="text-center">Profile Pic</th>
    </tr>
<?php 
    include('dbcon.php');
    if (isset($_POST['show'])) {

        $activity = $_POST['activity'];
        $RollNo = $_POST['roll'];

        $sql = "SELECT * FROM `student` WHERE `activity` = '$activity' OR `rollno`='$RollNo'";

        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $Id = $DataRows['id'];
                $RollNo = $DataRows['rollno'];
                $Year = $DataRows['Year'];
                $Name = $DataRows['name'];
                $Department = $DataRows['Department'];
                $Activity = $DataRows['Activity'];
                $ProfilePic = $DataRows['image'];
                ?>
                <tr>
                    <td><?php echo $RollNo;?></td>
                    <td><?php echo $Year;?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $Department; ?></td>
                    <td><?php echo $Activity; ?></td>
                    <td><img src="databaseimg/<?php echo $ProfilePic;?>" alt="img"></td>
                </tr>
                <?php
                
            }
            
        } else {
            echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
        }
    }

 ?>
    


<!--include header part of html-->
<?php include('footer.php') ?>

