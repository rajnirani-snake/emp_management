<?php

    include '../../conn.php';

    $id = $_GET['id'];

    $q = " DELETE FROM `department` WHERE id = $id ";

    mysqli_query($con, $q);

    header('location:/core_admin/admin/department/department_list.php');

    ?> 