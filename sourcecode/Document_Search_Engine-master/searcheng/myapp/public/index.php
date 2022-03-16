<?php
session_start();
require './libs/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

include "pstemmer.php";
require_once 'dbHandler.php';
require_once 'utils.php';
require_once 'dbHandler.php';

$app->get('/search',function() {
      
      $type=$_GET['type'];
      $key=$_GET['key'];
      $terms=explode(" ",$key);
  
      $query="select * from documents where ";
      $cnt=1;
	  
      foreach($terms as $word)
      {
          $stem = PorterStemmer::Stem($word);
		
          if($cnt==1)
              $query=$query."keywords LIKE '%$stem%' ";
          else
              $query=$query." OR keywords LIKE '%$stem%'";
          $cnt=0;
      }
	     
      if(strcmp("any",$type)!=0)
          $query=$query." and type='$type'";
     
      $db=new DbHandler();
      $r=$db->conn->query($query);

	   $outp = "[";
      if($r->num_rows > 0)
      {
       //  $i=0;
         while($row=$r->fetch_assoc())
         {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"id":"'  . $row['id'] . '",';
    $outp .= '"title":"'   . $row["title"]. '",';
	$outp .= '"description":"' . $row["description"]. '",';
	$outp .= '"link":"'   . $row["link"]. '",';
	$outp .= '"image":"'   . $row["image"]. '",';
	$outp .= '"author":"'   . $row["author"]. '",';
    $outp .= '"type":"'. $row["type"]. '"}'; 
}
$outp .="]";
 
         $res["status"]="Success";
         $res["message"]="Search is successful";
         $res["code"]="";
         $res["response"]=$outp;
         //header('Content-type: application/json');
         //$jr=json_encode($outp);
         //echo $jr;
		echo $res["response"];
         //return $jr;
      }
      else
      {
         $res["status"]="Success";
         $res["message"]="No document found";
         $res["code"]="";
         $res["response"]=array(array("title"=>"Please try to search using proper keywords or follow the link given below." ,
                                      "description"=>"", "link"=>""));
         
         $jr=json_encode($res);
         echo $jr;
      } 
});


$app->post('/upload', function () use ($app) {
    $db = new DbHandler();
    $response = array();
   $app->request->getBody();
  $request = json_decode($app->request->getBody());
   var_dump($request);
    $creation_date=Utils::getCurrentDate();
    $updated_date = $creation_date;
 // echo $request;
 $imagedata=base64_decode($request->imagedata);
 $docdata=base64_decode($request->docdata);
 
  $loc2="./document/thumbnail/".$request->image;
$loc3="./document/doc/".$request->doc;
    $loc="http://localhost/searcheng/myapp/public/document/thumbnail/".$request->image;
	$loc1="http://localhost/searcheng/myapp/public/document/doc/".$request->doc;
//	$teamImage = $_FILES["imagedata"];
    //  move_uploaded_file( $_FILES['imagedata']['tmp_name'],$loc2);
	//  move_uploaded_file( $_FILES['file']['tmp_name'],$loc3);
//move_uploaded_file($teamImage,"http://localhost/searcheng/myapp/public/search/document/");
  //  $nimage=$_FILES['imagedata']['name'];
	//$ndoc=$_FILES['file']['name'];
  
 $successimage = file_put_contents($loc2, $imagedata);
 $successdoc = file_put_contents($loc3, $docdata);




   try {
	$db->setAutoCommit(FALSE);
	//echo $request->image;
	$sql = "INSERT INTO documents (id,title,description,author,keywords,link,image,type,link2,image2) VALUES (NULL,'$request->title','$request->description','$request->author','$request->keywords','$loc1','$loc','$request->type','$loc3','$loc2')";
	//$_SESSION["uname"]=$request->uname;
	 //echo $_POST['iname'];
 



	if (!($stmt = $db->conn->prepare($sql))) {
	    throw new Exception("Prepare failed: (" . $db->conn->errno . ") ");
	}
	if (!$stmt->execute()) {
	    throw new Exception("Execute failed: (" . $stmt->errno . ") ");
	}
	else
	{
	    $response["status"] = "success";
	    $response["message"] = "Document(s) added successfully.";
	    $response["cause"] = "";
	    $response["response"]="";
	    $db->commit();
	}
	$jr=json_encode($response);
	echo $jr;
    } catch (Exception $error) {
	$db->rollback();
	$response["status"] = "error";
	$response["message"] = "Server not able to add document(s)";
	$response["cause"] = "Exception:" . $error->getMessage();
	$response["response"] = "Trace:" . $error->getTraceAsString();
	$jr=json_encode($response);
	echo $jr;
    }

});

$app->post('/delete', function () use ($app) {
    $db = new DbHandler();
    $response = array();
   $request = json_decode($app->request->getBody());
   var_dump($request);
   // $request = json_decode($_POST['del']);
    $creation_date=Utils::getCurrentDate();
    $updated_date = $creation_date;
    
    try {
	$db->setAutoCommit(FALSE);
	//echo $request->image;
	$sql = "delete from documents where  id='$request->id'";
	$sqlnew = "select * from documents where  id='$request->id'";
	$con =mysqli_connect("localhost","root","","searcheng");
	$result=mysqli_query($con,$sqlnew);
	$rows = mysqli_num_rows($result);
	if (!($stmt = $db->conn->prepare($sql))) {
	    throw new Exception("Prepare failed: (" . $db->conn->errno . ") ");
	}
	else
	{
		$query = "select * from documents where  id='$request->id'";
		$r=$db->conn->query($query);
		$row=$r->fetch_assoc();
		$l=$row['link2'];
		$l1=$row['image2'];
		if($l)
		unlink($l);
	    if($l1)
		unlink($l1);
		
		
	}
	if (!$stmt->execute()) {
	    throw new Exception("Execute failed: (" . $stmt->errno . ") ");
	}
	else if($rows > 0)
	{
	    $response["status"] = "success";
	    $response["message"] = "Document(s) deleted successfully.";
	    $response["cause"] = "";
	    $response["response"]="";
	    $db->commit();
	}
	else
	{
		echo $stmt->num_rows;
	    $response["status"] = "success";
	    $response["message"] = "Document(s) not found.";
	    $response["cause"] = "";
	    $response["response"]="";
	    $db->commit();
	}
	$jr=json_encode($response);
	echo $jr;
    } catch (Exception $error) {
	$db->rollback();
	$response["status"] = "error";
	$response["message"] = "Server not able to connect to database";
	$response["cause"] = "Exception:" . $error->getMessage();
	$response["response"] = "Trace:" . $error->getTraceAsString();
	$jr=json_encode($response);
	echo $jr;
    }
    
});

$app->post('/update', function () use ($app) {
    $db = new DbHandler();
    $response = array();
	//$request = json_decode($_PUT['doc']);
   // parse_str(file_get_contents("php://input"),$request);
 $request = json_decode($app->request->getBody());
 echo "<br>".$app->request->getBody();
    var_dump($request);
    
    $creation_date=Utils::getCurrentDate();
    $updated_date = $creation_date;
	
	$loc2="./document/thumbnail/".$request->image;
    $loc3="./document/doc/".$request->doc;
    $loc="http://localhost/searcheng/myapp/public/document/thumbnail/".$request->image;
	$loc1="http://localhost/searcheng/myapp/public/document/doc/".$request->doc;

	
	 $imagedata=base64_decode($request->imagedata);
     $docdata=base64_decode($request->docdata);
	  $successimage = file_put_contents($loc2, $imagedata);
      $successdoc = file_put_contents($loc3, $docdata);
//$loc="./document/thumbnail/";
//$loc1="./document/doc/";
//	$teamImage = $_FILES["imagedata"];
     //move_uploaded_file( $_FILES['imagedata']['tmp_name'],$loc);
	 // move_uploaded_file( $_FILES['docdata']['tmp_name'],$loc1);
   // move_uploaded_file($request['imagedata'],$loc);
	 // move_uploaded_file($request['docdata'],$loc1);

	  
	  
	  //move_uploaded_file($teamImage,"http://localhost/searcheng/myapp/public/search/document/");
   // $nimage=$_FILES['imagedata']['name'];
	//$ndoc=$_FILES['docdata']['name'];
	
    
    try {
	$db->setAutoCommit(FALSE);
	
	//echo $request->image;
	$sql = "select * from documents where id='$request->id'";

	$con =mysqli_connect("localhost","root","","searcheng");
	$result=mysqli_query($con,$sql);
	$rows = mysqli_num_rows($result);
	if (!($stmt = $db->conn->prepare($sql))) {	
	    throw new Exception("Prepare failed: (" . $db->conn->errno . ") ");
	}
	if (!$stmt->execute()) {
	    throw new Exception("Execute failed: (" . $stmt->errno . ") ");
	}
	else if($rows <= 0)
	{
	    $response["status"] = "success";
	    $response["message"] = "Document not found";
	    $response["cause"] = "";
	    $response["response"]="";
	    $db->commit();
	}
	else
	{		
		
		$query = "select * from documents where  id='$request->id'";
		$result=mysqli_query($con,$query);
		
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$l=$row['link2'];
		$l1=$row['image2'];
		//if($l)
		//unlink($l);
	    //if($l1)
		//unlink($l1);
    
	$sqlnew = "update documents set title='$request->title' ,link='$loc1',image='$loc',link2='$loc3',image2='$loc2', author='$request->author' , description='$request->description' , keywords='$request->keywords' , type='$request->type' where id='$request->id'";
	$result=mysqli_query($con,$sqlnew);
	
	
		
	    $response["status"] = "success";
	    $response["message"] = "Document updated successfully.";
	    $response["cause"] = "";
	    $response["response"]="";
	    $db->commit();
	
	
	}
	
	$jr=json_encode($response);
	echo $jr;
    } catch (Exception $error) {
	$db->rollback();
	$response["status"] = "error";
	$response["message"] = "Server not able to connect to database";
	$response["cause"] = "Exception:" . $error->getMessage();
	$response["response"] = "Trace:" . $error->getTraceAsString();
	$jr=json_encode($response);
	echo $jr;
    }
    
});

$app->get("/login", function () use ($app) {
       
      $username=$_GET['username'];
      $password=$_GET['password'];
  
      
      $query="select * from user where username='$username' and password='$password'";
      
      $db=new DbHandler();
      $r=$db->conn->query($query);
      
      if($r->num_rows > 0)
      {
                  
         $res["status"]="Success";
         $res["message"]="Login is successful";
         $res["code"]="200";
        // $res["response"]=$result;
         //header('Content-type: application/json');
         $jr=json_encode($res);
         echo $jr;
         //return $jr;
      }
      else
      {
         $res["status"]="Success";
         $res["message"]="No User found";
         $res["code"]="500 Internal Server Error";
         $res["response"]=array(array("title"=>"Please try to search using proper keywords or follow the link given below." ,
                                      "description"=>"", "link"=>""));
         
         $jr=json_encode($res);
         echo $jr;
      }
});


$app->run();
?>
