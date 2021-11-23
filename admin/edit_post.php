<?php

if(isset($_GET['p_id'])){
	$edit_post = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = {$edit_post}";
$post_query = mysqli_query($connect,$query);

while($row = mysqli_fetch_assoc($post_query)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];



}

if(isset($_POST['edit_post'])){

	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category_id = $_POST['post_category'];
	$post_status = $_POST['post_status'];

	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];

// move uploaded files(images)

	move_uploaded_file($post_image_temp, "../images/$post_image");

	if(empty($post_image)){
		$query = "SELECT * FROM posts WHERE post_id = $edit_post";
		$post_image_empty = mysqli_query($connect ,$query);

		while($row = mysqli_fetch_assoc($post_image_empty)){
			$post_image = $row['post_image'];
		}
	}

	$query = "UPDATE posts SET ";
	$query .= "post_title = '{$post_title}', ";
	$query .= "post_category_id = '{$post_category_id}', ";
	$query .= "post_date = now(), ";
	$query .= "post_author = '{$post_author}', ";
	$query .= "post_status = '{$post_status}', ";
	$query .= "post_tags = '{$post_tags}', ";
	$query .= "post_image = '{$post_image}', ";
	$query .= "post_content = '{$post_content}' ";
	$query .= "WHERE post_id = {$edit_post} ";

	$edit_post_query = mysqli_query($connect,$query);

	if(!$edit_post_query){
		die("QUERY FAILDs : " . mysqli_error($connect));
	}

}
?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
	</div>
	<div class="form-group">
		<label for="post_category">Post Categories</label>
		<select name="post_category" id="post_category">

			<?php
			$query = "SELECT * FROM category";
			$cat_list = mysqli_query($connect,$query);
			while ($row = mysqli_fetch_assoc($cat_list)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

			 echo "<option value='{$cat_id}'>{$cat_title}</option>";
			}?>

		</select>
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
	</div>

	<div class="form-group">
		<label for="status">Post Status</label>
		<input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<img width="250"  src="../images/<?php echo $post_image; ?>">
		<input type="file" name="image">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>
		</textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="edit_post" value="Publish_post">
	</div>
</form>
