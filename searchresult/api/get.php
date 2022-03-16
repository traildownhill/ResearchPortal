<?php

 //connect to db
 include('../config/db.php');

 //validation
$has_search = isset($_GET['k']) && $_GET['k'] != '';

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: ../login/login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: ../login/login.php');
}

if ($has_search)
{
    //value from db
	$bsearch = $_GET['k'];

    //save the keyword from the url
    $trim_search = trim($_GET['k']);
  
    // create a base query and words string
    $sql_string = "SELECT * FROM tblbooks WHERE ";
    $display_words = "";

    // seperate each of the keywords
    $keywords = explode(' ', $trim_search); 
    
    //loop to search 
    foreach($keywords as $word){
        $sql_string .= " keywords LIKE '%".$word."%' OR ";
        $display_words .= $word." ";
    }
    $sql_string = substr($sql_string, 0, strlen($sql_string) - 3);

    $result = mysqli_query($con, $sql_string);
    $result_count = mysqli_num_rows($result);
    if($result_count > 0)
    {
        echo '<table class="search">';
        // display search result count to user
        echo '<div class="right"><b>'.$result_count.'</b> results found</div>';
        echo 'Your search for <i><b">" '.$display_words.' "</b></i> <hr /><br />';
        

        echo ' 
       
                <div class="btn-group" >
                    <div class="study">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Fields of Study
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Art</a>
                        <a class="dropdown-item" href="#">Biology</a>
                        <a class="dropdown-item" href="#">Computer Science</a>
                        </div>
                    </div>
                </div>
                
                &nbsp;
                <div class="btn-group">
                    <div class="date">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Publication Date
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Book</a>
                            <a class="dropdown-item" href="#">Study</a>
                            <a class="dropdown-item" href="#">Journal</a>
                        </div>
                    </div>
                 </div>';

     
      
   



        while ($row = mysqli_fetch_assoc($result))
        {
            echo '<table class="card">';
            echo' <tr>
                    <td>
                        <a style="color:#000;"href="'.$row['link'].'">
                        <h3 style="margin-left: 20px;margin-top: 10px;" >'.$row['title'].'
                        </a></h3>
                    </td>
                 </tr>
            
            <tr>
                <td>
                <p style="margin-left: 20px;">'.$row['b_description'].' </p></td>
            </tr>
            <br>
            <tr>
                <td><a href="#"><i style="margin-left: 20px;color:#597978;"> '.$row['author'].'</a> &#8226 '.$row['datepub'].'</i><br><br></td>
            </tr>';
        }  
        echo '</table>';  
	}
    else
    {
		echo 'No results found. Please search something else.';
	}
} 
else
{
    echo '';
}
?>