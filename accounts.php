<!DOCTYPE html>
<html>
	<head>

	</head>
		<body>
				<?php
				require 'db.php';
				try {
				$query = "SELECT * FROM account";
				$stmt = $dbc->prepare($query);
				$stmt->execute();
				echo "<table border='1' cellpadding='5'>";
				
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
				echo "<tr>";
				echo "<td><a href='detail.php?cu_id={$uid}'>{$uid}</a></td>";
				echo "<td>{$full_name }</td>";
				echo "<td>{$username}</td>";
				echo "<td>{$phone_number}</td>";
				echo "<td>{$email}</td>";
				echo "<td>{$po_box}</td>";
				echo "<td>{$addres}</td>";
				echo "<td>{$registration_date}</td>";
				echo "</tr>";
				}
				} catch(PDOException $e) {
					echo "Error: " . $e->getMessage();
				}
			?>
				</table> </br>
			
			</body>
</html>