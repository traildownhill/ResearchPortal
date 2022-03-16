<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Bundle v5.0.2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    
    <!-- Script -->
    <script src="" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/style.css">

</head>
  <body>
<nav class="navbar navbar-dark bg-dark navbar-expand-md" id="navbar">
        <div class="logo">
          <a class="navbar-brand" href="../searchresult/search_no_account.php"><img width="40" height="40" src="../sources/research.png" alt=""> Research Portal</a>
        </div>
</nav>
<br>
    <div class="container" style="width:800px;">
     <?php
        include("../account/api/post_new_user.php");
     ?>
      <h1 style="font-family: 'Montserrat', sans-serif; font-size:50px;"><center>Sign Up</center></h1>

      <form action="" method="POST">
        
      <div id="name-group" class="form-group" id="value-form">
          <label for="name">First Name</label>
          <input
            type="text"
            class="form-control"
            id="fname"
            name="fname"
            placeholder="First Name"
          />
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

        <button type="submit" class="btn btn-success" id="submit" name="btnsubmit" >
          Submit
        </button>
      </form>
      <br>
    </div>
    <footer class="page-footer font-small blue">
      <div class="footer-copyright text-center py-3" style="margin: 5% 0 0 0;">© 2021 Copyright: Heruela Group</div>
      </footer>
  </body>
</html>