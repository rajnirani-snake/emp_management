<?php

    include '../../conn.php';

    $id = $_GET['id'];

    $empdelete = " DELETE FROM `employee` WHERE id = $id ";

    mysqli_query($con, $empdelete);

    header('location:/core_admin/admin/employee/employee_list.php');

    ?> 