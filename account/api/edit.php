<?php
    include_once ("/xampp/htdocs/ResearchPortal/config/db.php");

    // $id =$_GET[];

    $sql = "UPDATE tblaccount set ucategory ='' WHERE id = ''";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
?>