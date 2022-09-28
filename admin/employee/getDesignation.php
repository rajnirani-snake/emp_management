<?php
include_once("../../conn.php");
$depart = $_POST['departmentId'];
$sql = "SELECT * FROM designation where department_id = '$depart'";
$result = mysqli_query($con, $sql);
// $rows = mysqli_fetch_assoc($result);
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $name = $row['name'];

    $return_arr[] = array("id" => $id,
                    "name" => $name);
}
echo json_encode($return_arr);

?>