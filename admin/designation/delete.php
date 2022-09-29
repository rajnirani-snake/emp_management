<?php

    include '../../conn.php';

    $id = $_GET['id'];

    $desidelete = " DELETE FROM `designation` WHERE id = $id ";

    mysqli_query($con, $desidelete);

    header('location:/core_admin/admin/designation/designation_list.php');

    ?> 