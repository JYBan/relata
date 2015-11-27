<?php

	session_start();
	$servername = "localhost";
	$username = "team17";
	$password = "dbteam17";
	$dbname = "team17";

	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
	
	if (mysqli_connect_error()) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT Password, Deactivated, Role FROM MEMBER WHERE UserID='".$_POST['id']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	   $row = $result->fetch_assoc();
	   	if($row["Password"]==$_POST["pwd"] && $row["Deactivated"]==0 ){
	   		$_SESSION['UserID'] = $_POST['id'];
	   		switch ($row["Role"]) {
	   			case 1:
	   				header("Location: http://team17.dothome.co.kr/admin.html");
	   				die();
	   				break;
	   			case 2:
	   				header("Location: http://team17.dothome.co.kr/appraiser.html");
					die();
	   				break;
	   			case 3:
	   				header("Location: http://team17.dothome.co.kr/presenter.html");
	   				die();
	   				break;
	   			default:
	   				echo "error no Rule data";
	   				break;
	   		}
	   	}
	   	else echo "wrong password";
	} else {
	    echo "no such id";
	}
	$conn->close();
?>