<?php 
session_start();
$user = $_SESSION['username'];
if(!isset($_SESSION['id'])){
    header("Location:/core_admin/admin/department/add_new_department.php");
}
?>
<?php
  include '../../conn.php';
  if(isset($_POST['update'])){
  $id = $_GET['id'];
  $name = $_POST['name'];
  $q = "update department set name='$name' where id=$id ";
  $query = mysqli_query($con,$q);

  header('location:/core_admin/admin/department/department_list.php');
  }
  ?>
   <?php
  $postid = intval($_GET['id']);
  $result = mysqli_query($con,"SELECT * FROM department where id=$postid");
  $row = $result->fetch_assoc();
  $name = $row["name"];
    ?>
      <?php 
      include '../include/header.php'
      ?>
      <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <?php 
      include '../include/sidebar.php';
      ?>

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
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                      <form class="forms-sample" action="" method="post">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Depart Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
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