<?php include("../login/api/session_checker.php");?>
<!doctype html>
<html lang="en">
  <head>
    <title>Research Portal</title>
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
<!------------------------- Navigation Bar --------------------------------->
    <nav class="navbar navbar-dark bg-dark navbar-expand-md" id="navbar">
        <div class="logo">
          <a class="navbar-brand" href="../searchresult/search.php"><img width="40" height="40" src="../sources/research.png" alt=""> Research Portal</a>
        </div>

        <ul class="navbar-nav ml-auto" id="navbutton" style="margin: 0 0 0 65%;">
            <?php
                $categ = $login_categ;
                if($categ == "Administrator")
                {?>
                    <a href="../admin/admin_dashboard.php" ><input id="btnmanage" type="submit" class=" btn btn-success btn-sm " value="Management" style="margin: 0 0 0 -12%;"></a>
                    <a href="##" ><input id="btnprofile" type="submit" class=" btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#profileModal" value="Profile" style="margin: 0 0 0 -10%;"></a>
                    <a href="../login/api/logout.php"><input id="btnlogout" type="submit" class=" btn btn-success btn-sm " value="Logout""></a>
                <?php
                }
                else
                {?>
                    <a href="##" ><input id="btnprofile" type="submit" class=" btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#profileModal" value="Profile" style="margin: 0 0 0 -10%;"></a>
                    <a href="../login/api/logout.php"><input id="btnlogout" type="submit" class=" btn btn-success btn-sm " value="Logout""></a>
                <?php
                }
            ?>
        </ul>
    </nav>
    
<!------------------------------- Profile Modal --------------------------------->
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

    <br><br>
    <div class="container" style="width:1200px;">
        <h2 align="center">AU Research Portal</h2>
        <br/>
        <div id="wrapper">
            <div class="s-group s-group-lg">       
                <center>
                    <form action="" method="GET" name="">
                        <table style ="width: 100%; margin-left:10%;">
                            <tr>
                                <td><input 
                                type="text" 
                                class="form-control" 
                                name="k" 
                                aria-describedby="inputGroup-sizing-lg" 
                                placeholder="Search here" autocomplete="off"></td>
                                <td><input class=" btn btn-success btn-md"
                                type="submit" style="width:100px" id="btn_search"></td>
                            </tr>
                        </table>
                    </form><hr>
                </center>

<!------------------------------ Filtering ------------------------------------->
                <table style="margin-left: 10%;" id="filtering">
                    <tr >
                        <td>
                            </td>
                        <td>
                            <div class="dropdown" style="margin-left: 5%;">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Field of study
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" >
                                    <li>
                                    <div class="form-check" style="margin-left: 5%; ">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" >
                                        <label class="form-check-label" for="defaultCheck1">
                                            Bussiness
                                        </label>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="form-check" style="margin-left: 5%; ">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" >
                                        <label class="form-check-label" for="defaultCheck1">
                                            Computer Science
                                        </label>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="form-check" style="margin-left: 5%; ">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" >
                                        <label class="form-check-label" for="defaultCheck1">
                                            Medical Field
                                        </label>
                                    </div>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown"  style="margin-left: 25%;">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Date
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">2022</a></li>
                                    <li><a class="dropdown-item" href="#">2021</a></li>
                                    <li><a class="dropdown-item" href="#">2020</a></li>
                                    <li><a class="dropdown-item" href="#">2019</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown"  style="margin-left: 35%;">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Author
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown"  style="margin-left: 30%;">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort by Relevance
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Sort by Relevance</a></li>
                                    <li><a class="dropdown-item" href="#">Sort by Citation Count</a></li>
                                    <li><a class="dropdown-item" href="#">Sort by Most Views</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>
                <hr>

<!--------------------------- List of Result --------------------------------->
                <?php
                    include ("../homepage/api/api_get_value.php");
                ?>

                <table class="search">
                     <!--Loop Here  -->
                    <!-- <tr id="line1">
                        <td><h3><a href="../papers/uploads/untitled.pdf" class="modal-dialog modal-dialog-centered modal-dialog-scrollable">Title</a></h3></td>
                    </tr>
                    <tr id="line2">
                        <td><i>Author * Department * Field of Study * Date Publish</td>
                        <td><i>Cite</i></td>
                    </tr>
                    <tr id="line3">
                        <td>Abstract</td>
                    </tr>
                    <table>
                        <tr id="line4">
                            <td id="cite"><a href="###"><i> Cite  </i></a></td>
                            <td id="views"><a href="###"><i> Views  </i></a></td>
                            <td id="downloads"><a href="###"><i> Downloads  </i></a></td>
                        </tr>
                    </table> -->
                </table>

<!----------------------- Vertically centered scrollable modal -------------------------->
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <a href="../papers/uploads/untitled.pdf"></a>
                </div>
            </div>
            <hr>
        </div>

<!------------------------- Footer -------------------------->
        <footer class="page-footer font-small blue">
            <div class="footer-copyright text-center py-3" style="margin: 12% 0 0 0;">© 2021 Copyright: Malindog Group</div>
        </footer>
    </body>
</html>

<script src="../searchresult/script/main.js"></script>