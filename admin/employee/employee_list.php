<?php 
 include '../../conn.php';
?>
<?php 
session_start();
$user = $_SESSION['username'];
if(!isset($_SESSION['id'])){
  header("Location: http://localhost/core_admin/");
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
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Employee Table</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Id </th>
                            <th>Employee Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Joining Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $result = mysqli_query($con,"SELECT * FROM employee" );
                                if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {?>
                            <tr>
                              <td><?php echo $row['id'];?></td>
                              <td><?php echo $row['emp_name'];?></td>
                              <td><?php echo $row['email'];?></td>
                              <td><?php echo $row['contact'];?></td>
                              <td><?php echo $row['joining_date'];?></td>
                           
                    <?php echo  '<td>
                            <div class="badge badge-outline-success"><a href="../employee/update.php?id='. $row["id"] .'">Edit</a></div>
                            </td>
                            <td>
                             <div class="badge badge-outline-danger"> <a href="../employee/delete.php?id='. $row["id"] .'">Delete</a></div>
                            </td> '?>
                            
                          
                      
                          </tr> 
             <?php  } } else {

                  echo "no Eemployee found";

              } ?>
                        </tbody>
                      </table>
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