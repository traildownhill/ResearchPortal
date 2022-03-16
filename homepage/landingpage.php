<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS Local -->
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="../css/landing.css">
    
    <title>Research Portal</title>
</head>

<body>
<!--Nav bar-->
<nav class="navbar navbar-dark bg-dark navbar-expand-md" id="navbar">
            <div class="logo">
            <a class="navbar-brand" href="../searchresult/search.php"><img width="40" height="40" src="../images/research.png" alt=""> Research Portal</a>
            </div>

        <ul class="navbar-nav ml-auto" style="margin: 0 0 0 55%;">
        <a href="##" ><input type="submit" class=" btn btn-success btn-md" value="Profile" name="but_profile" style="margin: 0 0 0 -10%;"></a>
        <a href="../login/login.php" ><input type="submit" class=" btn btn-success btn-md" value="Logout" name="but_logout"></a>
        </ul>
</nav>
<!--Search bar-->
<div class="search">
    <div class="heading">
        <img src="../sources/research.png" id="logo" alt=""><h1 id="respo">ResearchPortal</h1>
    </div>
    
    <div class="container-fluid">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </div>
</div>
</body>
</html>
