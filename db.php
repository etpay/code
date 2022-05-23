<?php
try {
$dbc = new PDO('mysql:host=10.180.50.215:3306; dbname=p1', 'yeseras1', 'Its1b5?26');
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>