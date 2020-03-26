<?php

$connect = new PDO('mysql:host=localhost;dbname=postpage', 'root', '');

	$error = '';
	$comment_email = '';
	$comment_content = '';

	if(empty($_POST["comment_email"]))
	{
		$error .= '<p class="text-danger">Email is required</p>';
	}
	else if(!filter_var($_POST["comment_email"], FILTER_VALIDATE_EMAIL))
	{
   	$error .= '<p class="text-danger">Wrong Email</p>';
	}
	else
	{
		$comment_email = $_POST["comment_email"];
	}


	if(empty($_POST["comment_content"]))
	{
		$error .= '<p class="text-danger">Comment is required</p>';
	}
	else
	{
		$comment_content = $_POST["comment_content"];
	}

	if ($error == '')
	{
		$query = "
		INSERT INTO comment
		(comment, comment_sender_email)
		VALUES (:comment, :comment_sender_email)";


		$statement = $connect->prepare($query);
		$statement->execute(
				array (
					':comment'					=> $comment_content,
					':comment_sender_email'	=> $comment_email
				)
		);
		$error = '<label class="text-success">Comment Added</label>';
	}

	$data = array(
		'error'	=> $error
	);

	echo json_encode($data);

?>
