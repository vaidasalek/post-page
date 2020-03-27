<?php

$connect = new PDO('mysql:host=localhost;dbname=postpage', 'root', '');

$query = "
	SELECT * FROM comment
	ORDER BY ID DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output  = '';
foreach ($result as $row)
{
	$output .= '

		<div class="card-body">
			<div class="card-header">By <b>'.$row["comment_sender_email"].'
				</b> on <i>'.$row["date"].'</i></div>
			<div class="card-body">'.$row["comment"].'</div>
		</div>

	';
}

echo $output;

?>
