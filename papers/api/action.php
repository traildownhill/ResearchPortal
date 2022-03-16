<?php

    $con = mysqli_connect("localhost","root","","research_portal");
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  die();
  	}
      include_once "../login/api/session_checker.php";
      
// ---------------------------------------------------------------//
if(isset($_POST['r_submit']))
{
    //check if empty and post method
    $has_title = isset($_POST['title']) && $_POST['title']!="";
    $has_abs = isset($_POST['abstract']) && $_POST['abstract']!="";
    $has_comm = isset($_POST['comment']) && $_POST['comment']!="";
    $has_aut = isset($_POST['author']) && $_POST['author']!="";
    $has_email = isset($_POST['email']) && $_POST['email']!="";
    $has_dpub = isset($_POST['dpub']) && $_POST['dpub']!="";
    $has_fstudy = isset($_POST['fstudy']) && $_POST['fstudy']!="";
    $has_tag = isset($_POST['tags']) && $_POST['tags']!="";
    $has_file = isset($_POST['fileToUpload']) && $_POST['fileToUpload']!="";

    if ($has_title && $has_abs && $has_comm && $has_aut && $has_email && $has_dpub && $has_fstudy)
    {
        //value from db
        $id = date("YmdHis");
        $title = $_POST['title'];
        $abs = $_POST['abstract'];
        $comment = $_POST['comment'];
        $tags = $_POST['tags'];
        $aut =$_POST['author'];
        $dpub =$_POST['dpub'];
        $fstudy = $_POST['fstudy'];
        $email = $_POST['email'];
        // $fileupload = $_POST['fileToUpload'];
    
        //for logs
        $date1 = date("Y/m/d");
        $time1 = date("G:m:s");

        //uploading the pdf file
        $location = "../uploads";
        
        //insert to database
        $result = mysqli_query($con, "INSERT INTO tblresearch (`id`, `title`, `abstract`, `comment`, `authors`, `email`, `date_publish`, `field_of_study`, `department`, `pdf_file`, `views`, `cites`, `downloads`, `tagging`) VALUES  ('$id', '$title', '$abs', '$comment','$aut','$dpub','$email','$dpub','$fstudy','','','','','$tags')");
        if($result > 0)
        {  echo "<script>alert('NewResearch paper Uploaded!');</script>";
            mysqli_query($con, "INSERT INTO tbllogs (`date`, `time`, `action`, `management`, `account`) VALUES ('$date1','$time1', 'Uploaded New Book $title with ','CMS by','Admin')");
        }
        else
        {?>
            <div class="alert alert-danger" role="alert">
            Failed to Upload!
            </div>
        <?php
        }
    } 
    else
    {?>
        <div class="alert alert-danger" role="alert">
        Fill in all the fields!
        </div>
    <?php
    }
}


// ---------------------------------------------------------------//
    if(isset($_GET['rsdelete']))
    {
        $id = $_GET['rsdelete'];

        $sql = "DELETE FROM tblresearch WHERE id = '$id'";
        $result = mysqli_query($con,$sql);
        if($result > 0) 
        {
            echo "<script>alert('Research Deleted!');</script>";
            // header("Location: /xampp/htdocs/ResearchPortal/admin/admin_dashboard.php");
        }
    }

    // if(isset($_GET['edit']))
    // {
    //     $id = $_GET['edit'];

    //     $sql = "UPDATE tblaccount set fname ='$fname',lname=''$lname', email='$email', pass='$pass', ucategory='$categ' WHERE id = '$id'";
    //     $result = mysqli_query($con,$sql);
    //     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //     $count = mysqli_num_rows($result);
    //     // check email if exist
    //         if($count == 1) 
    //         {
    //             $fname = $row['fname'];
    //             $lname = $row['lname'];
    //             $email = $row['email'];
    //             $pass= $row['pass'];
    //             $categ = $row['ucategory'];
                
    //             echo "<script>alert('Account Edited.');</script>";
    //         }
    // }

    if(isset($_GET['view'])){
        // $status = $_GET[''];
        $id =$_GET['view'];

         $sql = "SELECT * FROM tblresearch WHERE id = '$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1)
        {?>
            <center><div style="height: 900px; width: 80%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Research Viewer</h5>
                <a href="../admin/admin_dashboard.php"><button type="button" class="btn-close"></button></a>
                </div>
                <div class="body">
                    <?php $pdf_file = $row['pdf_file'];?>
                    <center><iframe src="<?php echo "$pdf_file"?>" width="80%" height="900px">
                    </iframe></center>
                </div>
            </div></center>
            <?php
        }
    }

    if(isset($_POST['closeviwer']))
    {
        header("Location: /xampp/htdocs/ResearchPortal/admin/admin_dashboard.php");
    }
?>