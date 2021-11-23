<?php

if(isset($_POST['create_user'])){
	// echo $_POST['title'];
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_role = $_POST['user_role'];
	$username = $_POST['username'];

	// $post_image = $_FILES['image']['name'];
	// $post_image_temp = $_FILES['image']['tmp_name'];

	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	// $post_date = date('y-m-d');
	// $post_comment_count = 4;

	//move uploaded file(image) from the temporary directory to the file
	
	//move_uploaded_file($post_image_temp, "../images/$post_image"); 

	$query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";
	$query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}',";
    $query .= "'{$username}','{$user_email}', '{$user_password}')";

    $add_user_query = mysqli_query($connect,$query);

    if(!$add_user_query){
    	die("QUERY FAILD " . mysqli_error($connect));
    }


}
?>
<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Firstname</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="title">Lastname</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>
	
    <div class="form-group">
		<select name="user_role" id="">

			<option value="subscriber">Role</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>

		</select>
	</div>

	<div class="form-group">
		<label for="title">Username</label>
		<input type="text" class="form-control" name="username">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="text" class="form-control" name="user_password">
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Add_user">
	</div>
</form>