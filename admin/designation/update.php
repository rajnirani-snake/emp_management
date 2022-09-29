<?php
include '../../conn.php';
session_start();
$user = $_SESSION['username'];
if(!isset($_SESSION['id'])){
  header("Location: http://localhost/core_admin/");
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $name = $_POST['designation'];
    $updatequery = "update designation set name='$name' where id=$id ";
    $query = mysqli_query($con,$updatequery);
    //echo $query;die;

  header('location:/core_admin/admin/designation/designation_list.php');
  }
  
  $postid = intval($_GET['id']);
  $result = mysqli_query($con,"SELECT * FROM designation where id=$postid");
  $row = $result->fetch_assoc();
  $name = $row["name"];
  $dep   = $row['department_id'];

    if(isset($_POST['desig'])){
    $name = $_POST['designation'];
    $department_id = $_POST['department'];
  
    $desigInsertQuery = " INSERT INTO `designation`(`department_id`, `name`) VALUES ('$department_id', '$name')";
          $query = mysqli_query($con,$desigInsertQuery);
          header("Location: /core_admin/admin/designation/add_new_designation.php");
      }
?>
      <?php
      include '../include/header.php';
      ?>
      <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
      <?php 
      include '../include/sidebar.php';
      ?>

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
                    <h4 class="card-title"><center>Add Designation</center></h4>
                        <div class="table-responsive">
                        <h4 class="card-title">Department Name</h4>
                        <form class="forms-sample" action="" method="post">
                          <div class="form-group">
                            <select id="department" class="form-control" name="department">
                                <option value="">Select Department Name</option>
                                <?php 
                                include_once("../../conn.php");
                                $sql = "SELECT * FROM department";
                                $result = mysqli_query($con, $sql);
                                while($rows = mysqli_fetch_assoc($result)){
                                    ?>
                                <option <?php echo ($dep == $rows["id"])?"selected":"" ?> value="<?php echo $rows["id"];?>"> <?php echo $rows["name"];?></option>
                                <?php } ?>
                            </select> <br>
                               <label for="exampleInputUsername1">Designation Name</label>
                               <input type="text" class="form-control" name="designation" value="<?php echo $name; ?>"><br> 
                              <button type="submit" class="btn btn-primary mr-2" name="update">Submit</button> 
                            </form>
                          </div>
                        </div>
                      </div>
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
