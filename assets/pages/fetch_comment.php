<?php

$connect = new PDO('mysql:host=localhost;dbname=postpage', 'root', '');

$query = "
	SELECT * FROM comment
	WHERE parent_comment_id = '0'
	ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output  = '';
foreach ($result as $row)
{
	$output .= '

		<div class="panel panel-default">
			<div class="panel-heading">By <b>'.$row["comment_sender_name"].'
				</b> on <i>'.$row["date"].'</i></div>
			<div class="panel-body">'.$row["comment"].'</div>
		</div>

	';
}

echo $output;

?>
