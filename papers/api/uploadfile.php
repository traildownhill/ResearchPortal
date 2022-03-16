<!DOCTYPE html>
<html>
  <head>
    <title>Upload Research</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Bundle v5.0.2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
  
  </head>
  <body>  
  <nav class="navbar navbar-dark bg-dark navbar-expand-md" id="navbar">
        <div class="logo">
          <a class="navbar-brand" href="../searchresult/search_no_account.php"><img width="40" height="40" src="../images/research.png" alt=""> Research Portal</a>
        </div>
  </nav>
  <br>
<div class="container" style="width:700px;">
	<?php
      include_once "../api/api_new_book_post.php";
    ?>
      <h1 style="font-family: 'Montserrat', sans-serif; font-size:50px;"><center> Upload Research </center></h1>
<form action="" method="POST">
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
<!---------------------- pdf file ------------------------------>
<div style="padding: 20px; border: 1px solid #999">
    <h4>Upload PDF File :</h4>
    <form enctype="multipart/form-data"
    	action="<?php print $_SERVER['PHP_SELF']?>" method="post">
    <p>
	<input type="hidden" name="MAX_FILE_SIZE" value="20000000" /> <input
    type="file" name="pdfFile"><br><br>
    <input type="submit" value="upload!"/>
	</p>
    </form>
<?php
if ( isset( $_FILES['pdfFile'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "../uploads/".$_FILES['pdfFile']['name'];

		if (file_exists($dest_file)) {
			print "The PDF file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile']['error'] == 0) {
				print "<b><u>Details : </u></b><br/>";
				print "File Name : ".$_FILES['pdfFile']['name']."<br.>"."<br/>";
				print "File location : ../api/uploads/".$_FILES['pdfFile']['name']."<br/>";
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
</form>
</div>

	
  <!-- ************************** -->
    <!-- Footer -->
    <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3" style="margin: 12% 0 0 0;">© 2021 Copyright: Malindog Group</div>
    </footer>
  </body>
</html>