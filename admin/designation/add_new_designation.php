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
  $department_id = $_POST['department_id'];
  
  $q = " INSERT INTO designation(department_id) VALUES ('$department_id')";
          $query = mysqli_query($con,$q);
           header("Location: /core_admin/admin/designation/add_new_designation.php?id=$department_id");
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

<?php
    //       $id = $_GET['id'];
    //       $result = mysqli_query($con,"SELECT * FROM designation WHERE department_id = $id");
    //         if ($result->num_rows > 0) {
    //           while($row = $result->fetch_assoc()) {
    //             echo '<div>
    //                   <div class="container">

    //                   </div>
    //                  </div>';
                     
    //           }
    // } else {
    //   echo "0 results";
    // }
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
                         <!-- <input type="hidden" value='<?php echo $id;?>' name="department_id"> -->
                          <div class="form-group">
                          <!-- <label for="exampleInputUsername1">Department Name</label>
                          <input type="text" class="form-control" name="name" value=""> -->
                              <select id="department" class="form-control" name="">
                                <option value="" selected="selected">Select Department Name</option>
                                <?php 
                                include_once("../../conn.php");
                                $sql = "SELECT * FROM department";
                                $result = mysqli_query($con, $sql);
                                while($rows = mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?php echo $rows["name"]; ?>"> <?php echo $rows["name"];?></option>
                                <?php } ?>
                              </select> <br>
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

