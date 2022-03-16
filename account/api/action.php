<?php

    $con = mysqli_connect("localhost","root","","research_portal");
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  die();
  	}
    //   include_once "../login/api/session_checker.php";
// ---------------------------------------------------------------//
if(isset($_POST['btnsubmitaccount']))
{
    //initiate the form
    $fname = isset($_POST['fname']) && $_POST['fname']!="";
    $lname = isset($_POST['lname']) && $_POST['lname']!="";
    $email = isset($_POST['email']) && $_POST['email']!="";
    $password = isset($_POST['password']) && $_POST['password']!="";
    $aumember = isset($_POST['aumember']) && $_POST['aumember']!="";
    
    //convert to post method for safety
    if ($fname && $lname && $email && $password && $aumember) 
    {   
        //value from db
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $aumember = $_POST['aumember'];
        
        $id = date("YmdHis");

        if($aumember == "--Are you a member of Arellano Community?--")
        {?>
            <div class="alert alert-danger" role="alert">
            Select if your a member of AU Community?
            </div>
        <?php
        }
        else
        {
            $sql = "SELECT * FROM tblaccount WHERE email = '$email'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            // check email if exist
            if($count >= 1) 
            {?>
                <div class="alert alert-danger" role="alert">
                    Email Already Exist!
                </div>
            <?php
            }
            else 
            {
                //insert to db
                $result = mysqli_query($con, "INSERT INTO tblaccount (id, fname, lname, email, pass, status, ucategory, au_member) VALUES ('$id','$fname', '$lname', '$email', '$password', 'Inactive', 'User','$aumember')");
                        
                // check if value inserted
                if($result > 0)
                {
                    echo "<script>alert('New account $email has successfully added.' );</script>";
                }
                else
                {
                    echo "<script>alert('Error in creating new account.');</script>";
                }
            }
        }    
    } 
    else
    {?>
        <div class="alert alert-danger" role="alert">
        Please provided all data. The entire form is required!
        </div>
    <?php
    }
}


// ---------------------------------------------------------------//
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];

        $sql = "DELETE FROM tblaccount WHERE id = '$id'";
        $result = mysqli_query($con,$sql);
        if($result > 0) 
        {?>
            <!-- <div class="alert alert-danger" role="alert">
            Acount Deleted!
            </div> -->
        <?php
            echo "<script>alert('Account Deleted!');</script>";
            header("Location:../admin/admin_dashboard.php");
        }
    }

    $fname = '';
    $lname = '';
    $email = '';
    $pass= '';
    $categ = '';

    if(isset($_GET['edit']))
    {
        $id = $_GET['edit'];

        $sql = "UPDATE tblaccount set fname ='$fname',lname=''$lname', email='$email', pass='$pass', ucategory='$categ' WHERE id = '$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        // check email if exist
            if($count == 1) 
            {
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
                $pass= $row['pass'];
                $categ = $row['ucategory'];
                
                echo "<script>alert('Account Edited.');</script>";
            }
    }

    if(isset($_GET['status']) && isset($_GET['id'])){
        $status = $_GET['status'];
        $id =$_GET['id'];

        if($status == "Active")
        {
            $sql = "UPDATE tblaccount SET status ='Inactive' WHERE id = '$id'";
            $result = mysqli_query($con,$sql);
            if($result > 0) 
            {?>
                <div class="alert alert-danger" role="alert">
                Acount Activated!
                </div>
            <?php
            // header("Location:../admin/admin_dashboard.php");
            }
        }
        elseif($status=="Inactive")
        {
            $sql = "UPDATE tblaccount SET status ='Active' WHERE id = '$id'";
            $result = mysqli_query($con,$sql);
            if($result == 1) 
            {?>
                <div class="alert alert-danger" role="alert">
                Acount Deactivated!
                </div>
            <?php
            // header("Location:../admin/admin_dashboard.php");
            }
        }
        else{
        }
        
    }
?>