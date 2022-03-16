<?php

 //connect to db
 include('../config/db.php');

 //validation
$has_search = isset($_GET['k']) && $_GET['k'] != '';


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

    if(mysqli_num_rows($result) > 0)
    {
        // display search result count to user
        echo '<br /><div class="right"><b><u>'.$result_count.'</u></b> results found</div>';
        echo 'Your search for <i>'.$display_words.'</i> <hr /><br />';

        echo '<table class="search">';
        while (mysqli_fetch_assoc($result))
        {
            echo '<tr>
            <td><h3><a href="'.$row['url'].'">'.$row['title'].'</a></h3></td>
            </tr>
            <tr>
                <td>'.$row['blurb'].'</td>
            </tr>
            <tr>
                <td><i>'.$row['url'].'</i></td>
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