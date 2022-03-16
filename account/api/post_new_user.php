<?php

//DB start connection
    include "/xampp/htdocs/ResearchPortal/config/db.php";
if(isset($_POST['btnsubmit']))
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
            
            // check email if exist
            if($count > 0) 
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
                    header("Location: ../searchresult/search_no_account.php");
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
?>