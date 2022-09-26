<?php 
session_start();
$user = $_SESSION['username'];
if(!isset($_SESSION['id'])){
  header("Location: http://localhost/core_admin/");
}
?>
<?php
 include '../../conn.php';
 if(isset($_POST['depart'])){
    $name = $_POST['name'];
    $q = " INSERT INTO department(name) VALUES ( '$name')";
            $query = mysqli_query($con,$q);
             header("Location: /core_admin/admin/department/add_new_department.php");
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
                          <label for="exampleInputUsername1">Department Name</label>
                          <input type="text" class="form-control" name="name" value="">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" name="depart">Submit</button> 
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