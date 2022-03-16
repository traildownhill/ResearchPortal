<?php
    include_once('/xampp/htdocs/ResearchPortal/config/db.php');
    include ("/xampp/htdocs/ResearchPortal/account/api/delete.php");
?>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-auto d-block">
            <table class="table table-striped" id="firstTable">
                <thead class="bg-primary text-white" id="firstThead">
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Email </th>
                    <th> Category </th>
                    <th> AU Member? </th>
                    <th colspan="2">Action</th>
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
                                    <td>
                                        <?php 
                                          $status = $user['status'];
                                          $id = $user['id'];
                                          if($status == "Active")
                                          {
                                        ?>
                                            <a href="api_display.php?deact=<?php echo $user['id'];?>"><input type="submit" class="btn btn-warning btn-sm" id="btn_edit" value="Deactive">
                                        </input></a>
                                            <?php 
                                          }
                                        if ($status == "Inactive")
                                          {?>
                                            <a href="api_display.php?act=<?php echo $user['id'];?>"><input type="submit" class="btn btn-warning btn-sm" id="btn_edit" value="Active">
                                        </input></a>
                                            <?php
                                          }
                                          ?>

                                        <a href="api_display.php?edit=<?php echo $user['id'];?>"><input type="submit" class="btn btn-warning btn-sm" id="btn_edit" value="Edit">
                                        </input></a>
                                        
                                        <a href="api_display.php?delete=<?php echo $user['id'];?>"><input type="submit" class="btn btn-warning btn-sm" id="btn_edit" value="Delete">
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