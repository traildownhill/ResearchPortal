<script>
    $( document).ready(function() 
{
console.log(<?php $id ?>);
// $("#btnact").click(function() 
// {
//   <?php
//     $sql = "UPDATE tblaccount set status ='Inactive' WHERE id = '$id'";
//     $result = mysqli_query($con,$sql);
//     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//     $count = mysqli_num_rows($result);
//     if($count >= 1)
//     {?
//       alert("Account Deactivate");
//       $(document).load();  
//     <?
//     }
//   ?>
// });

// $("#btdeact").click(function() 
// {
//   <?php
//     $sql = "UPDATE tblaccount set status ='Active' WHERE id = '$id'";
//     $result = mysqli_query($con,$sql);
//     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//     $count = mysqli_num_rows($result);
//     if($count >= 1)
//     {?>
//       alert("Account Activated");
//       $(document).load();  
//     <?php
//     }
//   ?>
// });
});
</script>