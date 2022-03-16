<?php

//DB start connection
include_once ("/xampp/htdocs/ResearchPortal/config/db.php");


if(isset($_POST['btnsubmit']))
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
    $has_pdf = isset($_POST['pdffile']) && $_POST['pdffile']!="";

    if ($has_title && $has_pdf && $has_abs && $has_comm && $has_aut && $has_email && $has_dpub && $has_fstudy)
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
        $pdf_file = $_POST['pdffile'];
    
        //for logs
        $date1 = date("Y/m/d");
        $time1 = date("G:m:s");
        
        // Uploaded file
             $result = mysqli_query($con, "INSERT INTO tblresearch (`id`, `title`, `abstract`, `comment`, `authors`, `email`, `date_publish`, `field_of_study`, `department`, `pdf_file`, `views`, `cites`, `downloads`, `tagging`) VALUES  ('$id', '$title', '$abs', '$comment','$aut','$email','$dpub','$fstudy','','$pdf_file','','','','$tags')");
            if($result > 0)
            {?>
                <div class="alert alert-success" role="alert">
                Research paper <?php $id ?> successfully added!
                </div>
                <?php
                mysqli_query($con, "INSERT INTO tbllogs (`date`, `time`, `action`, `management`, `account`) VALUES ('$date1','$time1', 'Uploaded New Book $title with ','CMS by','Admin')");
                header("Location: ../admin/admin_dashboard.php");
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
?>