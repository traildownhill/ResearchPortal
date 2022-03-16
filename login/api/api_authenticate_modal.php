<?php
    // include("/xampp/htdocs/ResearchPortal/config/db.php");
    $con = mysqli_connect("localhost","root","","research_portal");
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // username and password sent from form 
      $email = mysqli_real_escape_string($con,$_POST['txt_email']);
      $password = mysqli_real_escape_string($con,$_POST['txt_pwd']); 
      
      $sql = "SELECT * FROM tblaccount WHERE email = '$email'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // check email if exist
      if($count == 1) 
      {
        $em = $row['email'];
        $pass= $row['pass'];
        $status = $row['status'];
        $fname = $row['fname'];
        if( $email == $em && $password == $pass)
        {
            if($status == "Active")
            {
                // session_register("myusername");
                $_SESSION['login_user'] = $email;
                $_SESSION['fname'] = $fname;
                header("location: ../searchresult/search.php");
            }
            else
            {
                echo "<script>alert('Account Inactive.' );</script>";
            }
        }
        else
        {
            echo "<script>alert('Password do not match.' );</script>";
        }
      }
      else 
      {
        echo "<script>alert('Email doesn't Exist.' );</script>";
      }
   }
?>