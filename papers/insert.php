<?php
//insert.php

if(isset($_POST["id"]))
{
    $connect = new PDO("mysql:host=localhost;dbname=research_portal","root", "");
    $query = "INSERT INTO tblresearch(id, title, abstract, comment, author, email, 
    date_publish, field_of_study, tags) VALUES
    (:id, :title, :abstract, :comment, :author, :email, :dpub, :fstudy, :tags)";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':title' => $_POST["title"],
            ':abstract' => $_POST["abstract"],
            ':comment' => $_POST["comment"],
            ':author' => $_POST["author"],
            ':email' => $_POST["email"],
            ':dpublish' => $_POST["dpub"],
            ':fstudy' => $_POST["fstudy"],
            ':tags' => $_POST["tags"]
  )
 );
 $result = $statement->fetchAll();
 $output = '';
 if(isset($result))
 {
  $output = '
  <div class="alert alert-success">
   Your data has been successfully saved into System
  </div>
  ';
 }
 echo $output;
}

?>
