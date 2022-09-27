<?php 
session_start();
$user = $_SESSION['username'];
if(!isset($_SESSION['id'])){
  header("Location: http://localhost/core_admin/");
}
?>

<?php 
include '../../conn.php';

if(isset($_POST['desig'])){
  $res = $_POST['designation'];
  echo $res;die;
  //$department_id = $_POST['department_id'];
  
   $result_explode = ( $res);
  // print_r($result_explode );die;
  $designation = $result[0];
  //echo $designation;die;
  $department_id = $result[1];
  //echo $department_id;die;
  
  $q = " INSERT INTO `designation`(`department_id`, `name`) VALUES ('$department_id' , '$designation')";
          $query = mysqli_query($con,$q);
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
                              <select id="department" class="form-control" name="designation">
                                <option value="">Select Department Name</option>
                                <?php 
                                include_once("../../conn.php");
                                $sql = "SELECT * FROM department";
                                $result = mysqli_query($con, $sql);
                                while($rows = mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?php echo $rows["id"];?>"> <?php echo $rows["name"];?></option>
                                <?php } ?>
                                </select> <br>
                               <label for="exampleInputUsername1">Designation Name</label>
                               <input type="text" class="form-control" name="" value=""><br> 
                              <button type="submit" class="btn btn-primary mr-2" name="desig">Submit</button> 
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

