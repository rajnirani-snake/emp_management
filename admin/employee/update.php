<?php 
  include '../../conn.php';
session_start();
$user = $_SESSION['username'];
if(!isset($_SESSION['id'])){
  header("Location: http://localhost/core_admin/");
}
        if(isset($_POST['update'])){
            $id = $_GET['id'];
            $emp_name = $_POST['emp_name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $joining_date = $_POST['joining_date'];
            $updatequery = "update employee set emp_name='$emp_name', email='$email',contact='$contact', joining_date='$joining_date' where id=$id ";
            $query = mysqli_query($con,$updatequery);
            header('location:/core_admin/admin/employee/employee_list.php');
            }

            $postid = intval($_GET['id']);
            $result = mysqli_query($con,"SELECT * FROM employee where id=$postid");
            $row = $result->fetch_assoc();
            $emp_name = $row["emp_name"];
            $email = $row['email'];
            $contact = $row['contact'];
            $joining_date = $row['joining_date'];
            $dep = $row['department_id'];
           $des = $row['designation_id'];

         if(isset($_POST['emp'])){
            $emp_name = $_POST['emp_name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $joining_date = $_POST['joining_date'];
            $department_id = $_POST['department'];
            $designation_id = $_POST['designation'];
            $employInsertQuery = " INSERT INTO `employee`(`emp_name`, `email`, `contact`, `joining_date`, `department_id`, `designation_id`) VALUES ('$emp_name', '$email', '$contact', '$joining_date', '$department_id','$designation_id')";
            $query = mysqli_query($con, $employInsertQuery);

            if($query) {
                header("Location: /core_admin/admin/employee/add_new_employee.php");
            }
        }
        ?>
           <?php 
            include '../include/header.php';
            ?>
           <div class="container-scroller">
            <!-- partial:../../partials/_sidebar.html -->
            <?php include '../include/sidebar.php'?>

            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
              <!-- partial:../../partials/_navbar.html -->
              <?php 
              include '../include/navbar.php';
              ?>
              
                <div class="main-panel">
                <div class="content-wrapper">
                <div class="row">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Form</h4>
                      <form class="forms-sample" action="" method="post">
                        <div class="form-group">
                          <label for="exampleInputUsername1">Employee Name</label>
                          <input id="emp_name" type="text" class="form-control" name="emp_name" value="<?php echo $emp_name; ?>"><br>
                          <label for="exampleInputUsername1">Email</label>
                          <input id="email" type="email" class="form-control" name="email" value="<?php echo $email; ?>"><br>
                          <label for="exampleInputUsername1">Contact</label>
                          <input id="contact" type="tel" class="form-control" name="contact" value="<?php echo $contact; ?>"><br>
                          <label for="exampleInputUsername1">Joining Date</label>
                          <input id="joining_date" type="date" class="form-control" name="joining_date" value="<?php echo $joining_date; ?>"><br>
                          <p class="card-title">Department Name</p>
                           <select id="department" class="form-control" name="department">
                                <option value="">Select Department Name</option>
                                <?php 
                                $sql = "SELECT * FROM department";
                                $result = mysqli_query($con, $sql);
                                while($rows = mysqli_fetch_assoc($result)){
                                ?>
                                <option <?php echo ($dep == $rows["id"])?"selected":"" ?> value="<?php echo $rows["id"];?>"> <?php echo $rows["name"];?></option>

                                <?php } ?>
                            </select> <br>

                            <select id="designation" class="form-control" name="designation">
                                <option value="">Designation</option>
                                <?php 
                                $sql = "SELECT * FROM designation";
                                $result = mysqli_query($con, $sql);
                                while($rows = mysqli_fetch_assoc($result)){
                                ?>
                                <option <?php echo ($des == $rows["id"])?"selected":"" ?> value="<?php echo $rows["id"];?>"><?php echo $rows["name"]; ?></option>
                              

                                <?php } ?>
                            </select> <br>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" name="update">Submit</button> 
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
                </textarea>
                  </div>
                    <!-- Tabs Ends -->
                    </div>
                    </div>
                  </div>
                </div>
            
              <?php
              include '../include/footer.php';
              ?>