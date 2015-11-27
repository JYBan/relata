<?php

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
	$sql1 = "SELECT * FROM MEMBER WHERE UserID='".$_POST['id']."'";
	$result = $conn->query($sql1);
	if ($result->num_rows > 0) {
		echo '<script language="javascript">';
		echo 'confirm("duplicated ID!");';
		echo '</script>';
		$conn->close();
		
	}else{
		$birth = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
		$sql = "INSERT INTO MEMBER VALUES ('".$_POST['id']."', '".$_POST['pwd']."', '".$_POST['name']."', '".$_POST['sex']."', '".$_POST['phone']."', '".$birth."', '".$_POST['address']."', '".$_POST['age']."', '".$_POST['role']."', NULL, 0);";

		if ($conn->query($sql) === TRUE) {
			echo '<script language="javascript">';
			echo 'confirm("New record created successfully");';
			echo '</script>';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

?>