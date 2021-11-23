<?php

if(isset($_GET['edit_user'])){
	$user_edit_id = $_GET['edit_user'];
	$query = "SELECT * FROM users WHERE user_id = $user_edit_id";
	$edit_user_query = mysqli_query($connect,$query);
	while($row = mysqli_fetch_assoc($edit_user_query)){
            $edit_username = $row['username'];
            $edit_firstname = $row['user_firstname'];
            $edit_lastname = $row['user_lastname'];
            $edit_email = $row['user_email'];
            //$edit_image = $row['user_image'];
            $edit_role = $row['user_role'];
            $edit_password = $row['user_password'];
	}
}

if(isset($_POST['edit_user'])){
	// echo $_POST['title'];
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_role = $_POST['user_role'];
	$username = $_POST['username'];

	// $post_image = $_FILES['image']['name'];
	// $post_image_temp = $_FILES['image']['tmp_name'];

	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	
	$query = "UPDATE users SET ";
	$query .= "user_firstname = '{$user_firstname}', ";
	$query .= "user_lastname = '{$user_lastname}', ";
	$query .= "user_role = '{$user_role}', ";
	$query .= "username = '{$username}', ";
	$query .= "user_email = '{$user_email}', ";
	$query .= "user_password = '{$user_password}' ";
	$query .= "WHERE user_id = {$user_edit_id} ";

	$edit_user_query = mysqli_query($connect,$query);

	if(!$edit_user_query){
		die("QUERY FAILD : " . mysqli_error($connect));
	}
	



}
?>
<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Firstname</label>
		<input type="text" class="form-control" name="user_firstname" value="<?php echo $edit_firstname; ?>">
	</div>

	<div class="form-group">
		<label for="title">Lastname</label>
		<input type="text" class="form-control" name="user_lastname" value="<?php echo $edit_lastname; ?>">
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
		<input type="text" class="form-control" name="username" value="<?php echo $edit_username; ?>">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="user_email" value="<?php echo $edit_email; ?>">
	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="text" class="form-control" name="user_password" value="<?php echo $edit_password; ?>">
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="edit_user" value="Edit_user">
	</div>
</form>