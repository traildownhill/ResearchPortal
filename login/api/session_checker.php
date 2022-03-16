<?php
    session_start();
   $con = mysqli_connect("localhost","root","","research_portal");
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"SELECT * FROM tblaccount where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['fname'];
   $login_categ = $row['ucategory'];

if(!isset($_SESSION['login_user']))
{
    header("location:login.php");
    die();
}


?>