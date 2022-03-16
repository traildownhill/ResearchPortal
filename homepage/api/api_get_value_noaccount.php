<?php
//session_start();
$con = mysqli_connect("localhost","root","","research_portal");
// if(isset($_POST['btnsearch']))
//     {
        $has_search = isset($_GET['k']) && $_GET['k'] != '';

        
            if ($has_search)
        {
            //value from db
            $bsearch = $_GET['k'];

            //save the keyword from the url
            $trim_search = trim($bsearch);
                
            // create a base query and words string
            $sql_string = "SELECT * FROM tblresearch WHERE ";
            $display_words = "";

            // seperate each of the keywords
            $keywords = explode(' ', $trim_search); 

            //loop to search 
            foreach($keywords as $word)
            {
                $sql_string .= " title LIKE '%".$word."%' OR ";
                $display_words .= $word." ";
            }
            $sql_string = substr($sql_string, 0, strlen($sql_string) - 3);

            $query = mysqli_query($con, $sql_string);
            $result_count = mysqli_num_rows($query);

            if($result_count > 0)
            {
            // display search result count to user
                echo '<div class="right" id="count" value='.$result_count.'><b><u>'.$result_count.'</u></b> results found</div>';
                echo 'Your search for <b><u><i>'.$display_words.'</i></u></b> <hr/>';
                echo '<table class="search"">';
                while ($row = mysqli_fetch_assoc($query))
                {
                    echo '
                    <tr id="line1">
                    <td class="txttitle"><h3><a href="'.$row['pdf_file'].'">'.$row['title'].'</a></h3></td>
                    </tr>
                    <tr >
                        <table id="line2">
                        <td class="txtauthor"><i>'.$row['authors'].'</td>
                        <td class="txtdept"><i>'.$row['department'].'</td>
                        <td class="txtfstudy"><i>'.$row['field_of_study'].'</td>
                        <td class="txtdpub"><i>'.$row['date_publish'].'</td>
                        </table>
                    </tr>
                    <tr id="line3">
                        <td class="txtauthor">'.$row['abstract'].'</td>
                    </tr>
                    <tr>
                        <table id="line4">
                        <td class="txtciting"><i>'.'Citing: '.$row['cites'].'</td>
                        <td class="txtauthor"><i>'.'Views: '.$row['views'].'</td>
                        <td class="txtauthor"><i>'.'Downloads: '.$row['downloads'].'</i></td>
                        </table>
                    </tr>';
                    echo '<br>';    
                }
                
            echo '</table>';
            echo '<br><br>';
            }
            else
            {
                echo '<br /><div class="right"><b><u>'.$result_count.'</u></b> results found</div>';
                echo 'Your search for <b><u><i>'.$display_words.'</i></u></b> <hr/>'; 
            }
        }
        else
        {
            //echo json_encode(array("statusCode"=>201));
        }
    
?>
