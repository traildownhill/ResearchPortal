<?php
require_once 'utils.php';
require_once 'dbHandler.php';
require 'vendor/autoload.php';

if(!isset($_SESSION['uname']))
{
    session_start();
}

$app = new \Slim\Slim();

$app->post("/signup", function () use ($app) {
    $db = new DbHandler();
    $response = array();
    $request = json_decode($app->request->getBody());
    var_dump($request);
    
    $GLOBALS['flag']=0;
    
    $creation_date=Utils::getCurrentDate();
    $updated_date = $creation_date;
    
    $dbr=new DbHandler();
    $q="select * from user";
    $r=$dbr->conn->query($q);
    if($r->num_rows>0)
    {
        while($row=$r->fetch_assoc())
        {
            if($request->uname==$row['uname'] || $request->email==$row['email'])
            {
                $GLOBALS['flag']=1;
                break;
            }
        }
    }
    
    if($GLOBALS['flag']==0)
    {
	    try {
		$db->setAutoCommit(FALSE);
		$sql = "INSERT INTO user (uname,email,pwd) VALUES ('$request->uname','$request->email','$request->pwd')";
		$_SESSION["uname"]=$request->uname;
		if (!($stmt = $db->conn->prepare($sql))) {
		    throw new Exception("Prepare failed: (" . $db->conn->errno . ") ");
		}
		if (!$stmt->execute()) {
		    throw new Exception("Execute failed: (" . $stmt->errno . ") ");
		}
		else
		{
		    $response["status"] = "success";
		    $response["message"] = "User added successfully.";
		    $response["cause"] = "";
		    $response["response"]="";
		    $db->commit();
		}
		$jr=json_encode($response);
		echo $jr;
	    } catch (Exception $error) {
		$db->rollback();
		$response["status"] = "error";
		$response["message"] = "Server not able to add user";
		$response["cause"] = "Exception:" . $error->getMessage();
		$response["response"] = "Trace:" . $error->getTraceAsString();
		$jr=json_encode($response);
		echo $jr;
	    }
     }
     else
     {
                $response["status"] = "error";
		$response["message"] = "UserName or Email-Id is already in use. Please try one more time.";
		$response["cause"] = "";
		$response["response"] = "";
		$jr=json_encode($response);
		echo $jr;
     } 
    
});

$app->get("/login", function ()  {

    $db = new DbHandler();
    $name=$_GET['uname'];
    $pwd=$_GET['pwd'];
    echo $name." ".$pwd;
    $sql_query = "select * FROM user where uname='$name' and pwd='$pwd'";
    $r = $db->conn->query($sql_query);
    if ($r->num_rows > 0) {
        $result=array();
        $result=$r->fetch_assoc();
        $_SESSION["uname"]=$name;
        $response["status"] = "success";
        $response["message"] = "Logged in successfully";
        $response["cause"] = "";
        $response["response"] = $result;
        $jr=json_encode($response);
        echo $jr;
    } else {
        $response["status"] = "success";
        $response["message"] = "UserName or password is incorrect. Please try again.";
        $response["cause"] = "";
        $response["response"] = [];
        $jr=json_encode($response);
        echo $jr;
    }
});


$app->get("/logout", function () {
    if(isset($_SESSION["uname"]))
       session_destroy();
});

$app->run();
?>
