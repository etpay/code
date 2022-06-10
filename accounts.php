
<?php
include 'auth_session.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   </head>
<body>
				<?php
				require 'db.php';
				try {
				$query = "SELECT * FROM account";
				$stmt = $dbc->prepare($query);
				$stmt->execute();
     echo "<table class='table table-dark  table-hover'>";
	echo "<tr>";
	echo "<th>full_name</th>";
	echo "<th>username</th>";
	echo "<th>phone_number</th>";
	echo "<th>email</th>";
	
	echo "<th>po_box</th>";
	echo "<th>addres</th>";
	echo "<th>registration_date</th> </tr>";
				
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
				echo "<tr>";
				echo "<td><a href='Detail?uid={$uid}'>{$uid}</a></td>";
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
			
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
