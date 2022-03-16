<?php
  $conn = mysqli_connect("localhost","root","","research_portal");
  include_once "../login/api/session_checker.php";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Bundle v5.0.2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    
  <title>Admin Dashboard</title>
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-dark bg-dark navbar-expand-md" id="navbar">
        <div class="logo">
          <a class="navbar-brand" href="../searchresult/search.php"><img width="40" height="40" src="../sources/research.png" alt=""> Research Portal</a>
        </div>

        <ul class="navbar-nav ml-auto" id="navbutton" style="margin: 0 0 0 75%;">
            <a href="##" ><input id="btnprofile" type="submit" class=" btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#profileModal" value="Profile" style="margin: 0 0 0 -10%;"></a>
            <a href="../login/login.php" ><input id="btnlogout" type="submit" class=" btn btn-success btn-sm " value="Logout""></a>
        </ul>
</nav>

<!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="card">
                <img src="../sources/user.jpg" style="width:100%">
                <h1><?php echo $login_session; ?></h1>
                <p id="title"><?php echo $login_categ; ?></p>
                <p>Arellano University</p>
                <p><button id="butcontact">Contact</button></p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

<!-- Managements Card -->
<br><br><div>
  <!-- Account -->
  <center><table>
    <tr>
      <td>
      <div class="card" style="width: 350PX;">
        <img class="card-img-top" src="../sources/account_manage.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">ACCOUNT MANAGEMENT</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#account" class="btn btn-primary">GO TO MANAGEMENT</a>
        </div>
      </div>
      </td>
      <td>
      <div class="card" style="width: 350PX;">
        <img class="card-img-top" src="../sources/rs_bg.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">RESEARCH MANAGEMENT</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#research" class="btn btn-primary">GO TO MANAGEMENT</a>
        </div>
      </div>
      </td>
    </tr>
  </table></center>
</div><br><br><br><br></br>



<!---------------------Account Management Section---------------------------->
<section id="account">
<div class="container pt-5" id="accountdiv">
 <?php include ("/xampp/htdocs/ResearchPortal/account/api/action.php");?>
  <table>
    <tr>
      <td><h1 style="font-weight: bold;">Account Management</h1></td>
    </tr>
    <tr>
      <td>
      <a type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add New User Account</a>
      </td>
      <td>
        <div class="input-group" style="margin: 0 0 0 100%;">
          <input type="search" class="form-control rounded" placeholder="Search First Name" aria-label="Search" style="width: 275px;" >
          <button type="button" class="btn btn-primary" id="accountsearch">Search</button>
        </div>
      </td>
      <td>
        
      </td>
    </tr>
    <tr><td><h4> </h4></td></tr>
  </table>

  <!-- Modal for New Account -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div id="name-group" class="form-group" id="value-form">
            <label for="name">First Name</label>
            <input
              type="text"
              class="form-control"
              id="fname"
              name="fname"
              placeholder="First Name"/>
          </div>

          <div id="name-group" class="form-group" id="value-form">
          <label for="name">Last Name</label>
          <input
            type="text"
            class="form-control"
            id="lname"
            name="lname"
            placeholder="Last Name"
          />
        </div>

        <div id="email-group" class="form-group">
          <label for="email">Email</label>
          <input
            type="text"
            class="form-control"
            id="email"
            name="email"
            placeholder="email@example.com"
          />
        </div>

        <div id="password-group" class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            placeholder="Password"
          />
        </div>

        <div id="member-group" class="form-group">
          <label for="aumember">Category</label>
          <select 
            id="aumember"
            class="form-control"
            name="aumember"
            value=" ">
            <option selected>--Are you a member of Arellano Community?--</option>
            <option value="Yes">Yes
            <option value="No">No
          </select>
        </div><br>

        <button type="submit" class="btn btn-success" id="submit" name="btnsubmitaccount" >
          Submit
        </button>
        </form>
      </div>
    </div>
    </div>
  </div>

<!-- Modal for Edit Account -->
  <div class="modal fade" id="editaccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div id="name-group" class="form-group" id="value-form">
            <label for="name">First Name</label>
            <input
              type="text"
              class="form-control"
              id="edit_fname"
              name="fname"
              placeholder="First Name"
              value ="<?php echo "$fname";?>"/>
          </div>

          <div id="name-group" class="form-group" id="value-form">
          <label for="name">Last Name</label>
          <input
            type="text"
            class="form-control"
            id="edit_lname"
            name="lname"
            placeholder="Last Name"
            value ="<?php echo "$lname";?>"/>
        </div>

        <div id="email-group" class="form-group">
          <label for="email">Email</label>
          <input
            type="text"
            class="form-control"
            id="edit_email"
            name="email"
            placeholder="email@example.com"
            value ="<?php echo "$email";?>"/>
        </div>

        <div id="password-group" class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            class="form-control"
            id="edit_password"
            name="password"
            placeholder="Password"
            value ="<?php echo "$pass";?>"/>
        </div>
        
        <div id="member-group" class="form-group">
          <label for="category">Category</label>
          <select 
            id="edit_category"
            class="form-control"
            name="category"
            value=" ">
            <option selected>--UserType--</option>
            <option value="Administrator">Administrator
            <option value="User">User
          </select>
        </div>
        <br>

        <button type="submit" class="btn btn-success" id="edit_submitaccount" name="btnsubmitaccount" >
          Submit
        </button>
        </form>
      </div>
    </div>
    </div>
  </div>

<!----------------- Table of Account----------------->
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-auto d-block">
            <table class="table table-striped" id="firstTable">
                <thead class="bg-primary text-white" id="firstThead">
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Email </th>
                    <th> Category </th>
                    <th> AU Member? </th>
                    <th> Status</th>
                    <th colspan="3">Action</th>
                </thead>
                <tbody>
                    <?php
                         $sql = "SELECT * FROM tblaccount";
                         $result = mysqli_query($con, $sql);
                 
                         if(mysqli_num_rows($result) > 0) {
                             $account = mysqli_fetch_all($result,MYSQLI_ASSOC);
                             foreach($account as $user) : ?>
                                <tr id="result">
                                    <td><?php echo $user['fname']; ?> </td>
                                    <td><?php echo $user['lname']; ?> </td>
                                    <td><?php echo $user['email']; ?> </td>
                                    <td><?php echo $user['ucategory']; ?> </td>
                                    <td><?php echo $user['au_member']; ?> </td>
                                    <td><?php echo $user['status']; ?> </td>
                                    <td>
                                        <?php 
                                          $status = $user['status'];
                                          if($status == "Active")
                                          {
                                            $stat1="Deactivate";
                                          }
                                          elseif($status =="Inactive")
                                          {
                                            $stat1 = "Activate";
                                          }
                                          $id = $user['id'];
                                        ?>
                                            <a href="admin_dashboard.php?status=<?php echo $user['status']?>&id=<?php echo $user['id']?>"><input type="submit" class="btn btn-primary btn-sm" id="btn_edit1" value="<?php echo "$stat1" ?>" ></input></a>
                                            <?php 
                                          ?>
                                          <a href="#editaccount"><input type="submit" class="btn btn-warning btn-sm" id="btn_edit" value="Edit" data-bs-toggle="modal" data-bs-target="#editaccount">
                                          </input></a>
                                          
                                          <a href="admin_dashboard.php?delete=<?php echo $user['id'];?>"><input type="submit" class="btn btn-danger btn-sm" id="btn_delete" value="Delete">
                                          </input></a>
                                    </td>
                                </tr>
                          <?php endforeach; 
                         }   
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section><br><br><br><br>

<!--------------------------- Research Management Section --------------------------------->
<section id="research">
<div class="container pt-5" id="researchdiv">
<table>
    <tr>
      <td><h2 style="font-weight: bold;">Research Management</h2></td>
    </tr>
    <tr>
      <td>
      <a href="../papers/newBook.php"><button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="" name="uploadingresearch">
              Add New Research Paper</button></a>
      </td>
      <td>
          <div class="input-group" style="margin: 0 0 0 123%;">
            <input type="search" class="form-control rounded" placeholder="Search Title" aria-label="Search" style="width: 275px;" >
            <button type="button" class="btn btn-primary">Search</button>
          </div>
        </td>
    </tr>
      <tr><td><h4> </h4></td></tr>
  </table>
<!---------------------- Modal for New Research ----------------------->
  <div class="modal fade" id="researchmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Research Paper</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
    
    <div id="id-group" class="form-group">
    <div class="form-group">
      <label>Id</label>
      <input type="text" name="id" id="id" class="form-control" />
     </div><br>

     <div class="form-group">
      <label>Research Title</label>
      <input type="text" name="title" id="title" class="form-control" />
     </div><br>
     
     <div class="form-group">
      <label>Abstract</label>
      <textarea rows="5" cols="60" type="text "name="abstract" id="abstract" class="form-control"></textarea>      
     </div><br>
     
     <div class="form-group">
      <label>Comment</label>
      <textarea rows="4" cols="60" type="text "name="comment" id="comment" class="form-control"></textarea>
     </div><br>
     
     <div class="form-group">
      <label>Author</label>
      <input type="text" name="author" id="author" class="form-control" />
     </div><br>
     
     <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" id="email" class="form-control" />
     </div><br>
     
     <div class="form-group">
      <label>Date Publish</label>
      <input type="date" name="dpub" id="dpub" class="form-control" />
     </div><br>
     
     <div class="form-group">
      <label>Field of Study</label>
      <input type="text" name="fstudy" id="fstudy" class="form-control" />
     </div><br>
     
     <div class="form-group ">
      <label>Tags</label>
      <input type="text" name="tags" id="tags" class="form-control" />
     </div><br>
    </form>

    <div style="padding: 20px; border: 1px solid #999">
    <h4>Upload PDF File :</h4>
    <form enctype="multipart/form-data"
    	action="<?php print $_SERVER['PHP_SELF']?>" method="post">
    <p>
	<input type="hidden" name="MAX_FILE_SIZE" value="20000000" /> <input
    type="file" name="pdfFile"><br><br>
    <input type="submit" value="Proceed!"/>
	</p>
    </form>
<?php
if ( isset( $_FILES['pdfFile'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "../papers/uploads/".$_FILES['pdfFile']['name'];

		if (file_exists($dest_file)) {
			print "The PDF file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile']['error'] == 0) {
				print "<b><u>Details : </u></b><br/>";
        ?>
        <input hidden type="text" name="pdffile" id="pdffile" class="form-control" value="<?php echo "../papers/uploads/".$_FILES['pdfFile']['name']?> " >
        <?php
        echo "File Name : ".$_FILES['pdfFile']['name']."<br.>"."<br/>";
				echo "File location : ../papers/uploads/".$_FILES['pdfFile']['name']."<br/>";
			}
		}
	}
	else {
		if ( $_FILES['pdfFile']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['pdfFile']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
		}
	}
}
?>
</div><br>
    <div class="form-group">
      <button type="submit" class="btn btn-success" id="submit" name="btnsubmit" >
          Submit
        </button>
     </div>
      </div>
    </div>
    </div>
  </div>
</div>

  <!-- Modal for Edit Research -->
  <div class="modal fade" id="researchmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Research Paper</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
        <div class="form-group">
        <label>Id</label>
        <input type="text" name="id" id="id" class="form-control" />
       </div><br>

       <div class="form-group">
        <label>Research Title</label>
        <input type="text" name="title" id="edit_title" class="form-control" />
       </div><br>
       
       <div class="form-group">
        <label>Abstract</label>
        <textarea rows="5" cols="60" type="text "name="abstract" id="edit_abstract" class="form-control"></textarea>      
       </div><br>
       
       <div class="form-group">
        <label>Comment</label>
        <textarea rows="4" cols="60" type="text "name="comment" id="edit_comment" class="form-control"></textarea>
       </div><br>
       
       <div class="form-group">
        <label>Author</label>
        <input type="text" name="author" id="edit_author" class="form-control" />
       </div><br>
       
       <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" id="edit_email" class="form-control" />
       </div><br>
       
       <div class="form-group">
        <label>Date Publish</label>
        <input type="date" name="dpub" id="edit_dpub" class="form-control" />
       </div><br>
       
       <div class="form-group">
        <label>Field of Study</label>
        <input type="text" name="fstudy" id="edit_fstudy" class="form-control" />
       </div><br>
       
       <div class="form-group ">
        <label>Tags</label>
        <input type="text" name="tags" id="edit_tags" class="form-control" />
       </div><br>

       <div class="form-group">
        <input type="submit" name="submit" id="edit_submit" class=" btn btn-success btn-md" value="Submit" />
       </div>
        </form>
      </div>
    </div>
    </div>
  </div>

  <!------------ Table for Research ----------------->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-auto d-block">
            <table class="table table-striped" id="firstTable" >
                <thead class="bg-primary text-white" id="firstThead"">
                    <th> Title </th>
                    <th> Comment  </th>
                    <th> Author </th>
                    <th> Date Publish </th>
                    <th> Field of Study </th>
                    <th> Department </th>
                    <th> Views </th>
                    <th> Cited </th>
                    <th colspan="3"> Action </th>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM tblresearch ";
                         $result = mysqli_query($conn, $sql);
                 
                         if(mysqli_num_rows($result) > 0) {
                             $research = mysqli_fetch_all($result,MYSQLI_ASSOC);
                             foreach($research as $rs) : ?>
                                <tr id="result">
                                    <td><?php echo $rs['title']; ?> </td>
                                    <td><?php echo $rs['comment']; ?> </td>
                                    <td><?php echo $rs['authors']; ?> </td>
                                    <td><?php echo $rs['date_publish']; ?> </td>
                                    <td><?php echo $rs['field_of_study']; ?> </td>
                                    <td><?php echo $rs['department']; ?> </td>
                                    <td><?php echo $rs['views']; ?> </td>
                                    <td><?php echo $rs['cites']; ?> </td>
                                    <td>
                                        <a href="admin_dashboard.php?view=<?php echo $rs['id']?>"><input type="submit" class="btn btn-primary btn-sm" id="btn_edit1" value="View" >
                                        </input></a>
                                        <a href="#editresearch"><input type="submit" class="btn btn-warning btn-sm" id="btn_edit" value="Edit" data-bs-toggle="modal" data-bs-target="#editresearch">
                                          </input></a>
                                        <a href="admin_dashboard.php?rsdelete=<?php echo $rs['id'];?>"><input type="submit" class="btn btn-danger btn-sm" id="btn_deleteresearch" value="Delete">
                                          </input></a>
                                    </td>
                                </tr>
                             <?php endforeach; 
                         }   
                         ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section><br>
<?php 
  include ("/xampp/htdocs/ResearchPortal/papers/api/action.php");
?>

<!-- Footer -->
<footer class="page-footer font-small blue">
<div class="footer-copyright text-center py-3" style="margin: 12% 0 0 0;">© 2021 Copyright: Heruela Group</div>
</footer>
</body>
</html>

<script>
  $(document).ready(function(){

      console.log("Website is Ready");
      $("#id").attr("disabled", "disabled");
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();
      var hh =today.getHours();
      var mm = today.getMinutes();
      var ss = today.getSeconds();
      
      today = yyyy + dd + hh + mm + ss;
      
      document.getElementById("id").value = today;
      console.log(today);

  })
</script>