<?php
	         $connect = new PDO ('mysql:host=localhost;dbname=postpage', 'root', '');

	         function rowCount($connect,$query) {
	            $stmt = $connect->prepare($query);
	            $stmt->execute();

	            return $stmt->rowCount();
	         }

					echo rowCount($connect, "SELECT * FROM comment");

	         ?>
