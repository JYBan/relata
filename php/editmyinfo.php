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


		//check id duplication
		
	$birth = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
	$sql = "UPDATE MEMBER SET Password='".$_POST['pwd']."', Name='".$_POST['name']."', Sex='".$_POST['sex']."', PhoneNum='".$_POST['phone']."', BirthDate='".$birth."', Address='".$_POST['address']."', Age='".$_POST['age']."' WHERE UserID='".$_SESSION['UserID']."';";

	if ($conn->query($sql) === TRUE) {
		echo '<script language="javascript">';
		echo 'confirm("Record updated successfully");';
		echo '</script>';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>