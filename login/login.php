
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
    <link rel="stylesheet" href="../css/style.css">
    
  <title>Login</title>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark navbar-expand-md" id="navbar">
        <div class="logo">
          <a class="navbar-brand" href="../searchresult/search_no_account.php"><img width="40" height="40" src="../sources/research.png" alt=""> Research Portal</a>
        </div>
  </nav>
    <br>
    <div class="container" style="width:700px;">
<?php
  include_once ("../login/api/api_authenticate.php");
?>
      <h1 style="font-family: 'Montserrat', sans-serif; font-size:50px;"><center>Sign In</center></h1>
        <form action="" method="POST">
          
        <div id="email-group" class="form-group" style="margin: 0 200px 0;">
            <label for="email">Email</label>
            <input
              type="text"
              class="form-control"
              id="txt_uemail"
              name="txt_email"
              placeholder="Email"
            />
          </div>
          <br>
          <div id="password-group" class="form-group" style="margin: 0 200px 0;">
            <label for="password">Password</label>
            <input
              type="password"
              class="form-control"
              id="txt_upwd"
              name="txt_pwd"
              placeholder="Password"
            />
          </div>
          <br>
          <button type="submit" class="btn btn-primary" id="but_submit" name="but_submit" style="margin: 0 200px 0; width: 80px;">
            Submit
          </button>
        </form>
        <br>
  </div>
</body>
</html>