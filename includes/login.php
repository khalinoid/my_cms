<?php
include 'db.php';

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username= mysqli_real_escape_string($connect,$username);
	$password= mysqli_real_escape_string($connect,$password);

	$query = "SELECT * FROM users WHERE username = '{$username}'";
	$user_login_query = mysqli_query($connect,$query);

	while($row = mysqli_fetch_assoc($user_login_query)){
		$db_user_id = $row['user_id'];
		$db_user_firstname = $row['user_firstname'];
		$db_user_lastname = $row['user_lastname'];
		$db_username = $row['username'];
		$db_password = $row['user_password']; 
	}

	if($username !== $db_username && $password !== $db_password){
		header("Location: ../index.php");
	}
	else if($username !== $db_username && $password !== $db_password){
		header("Location: ../admin.");
	}
	else{
		header("Location: ../index.php");
		
	}
}
?>