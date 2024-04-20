<?php

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$mediaHouse = $_POST['mediaHouse'];
	$mobileNumber = $_POST['mobileNumber'];
	$mckNumber = $_POST['mckNumber'];
	$designation = $_POST['designation'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "test";


	//create connection
	$conn = new mysqli($servername, $username, $password,'test');

	// Database connection
	
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : " . $conn->connect_error);
	} 
	else 
	{

		$stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, email, mediaHouse, mobileNumber, mckNumber, designation) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssiss", $firstName, $lastName, $email, $mediaHouse, $mobileNumber, $mckNumber, $designation);
		$execval = $stmt->execute();
		//echo $execval;
		
		//echo "Registration successfull...";
		echo '<script>alert("Registration Successful...");
		window.location="http://localhost:80/test"</script>'; 
		$stmt->close();
		$conn->close();

	}
