<?php
include 'auth_session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search you info</title>
</head>
<body>
    <form method="post">
        <label>Search By Id</label>
        <input type="text" name="search">
        <input type="submit" name="submit">
        <input type="submit" class="button" value="print" onClick="window.print()" />
        <a href="admin.php">Back</a> </br>
        </form>
        <?php
        require 'db.php';
        
        if (isset($_POST["submit"])) {
            $id = $_POST["search"];
            $sth = $dbc->prepare("SELECT * FROM `commit` WHERE cu_id = '$id'");
            
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth -> execute();
            
            if($row = $sth->fetch())
            {
            ?>
            <br><br><br>
            <table>
                <tr>
				<th>id</th>
                <th>name</th>
                <th>partner</th>
                <th>electric</th>
                <th>telecom</th>
                <th>Water</th>
                <th>house_related</th>
                <th>tax_pension_related</th>
                <th>others</th>
                <th>deadline</th>
                <th>status</th>
			</tr>
			<tr>
                <td><?php echo $row->cu_id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->partner; ?></td>
                <td><?php echo $row->electric; ?></td>
                <td><?php echo $row->telecom; ?></td>
                <td><?php echo $row->water; ?></td>
                <td><?php echo $row->house_related; ?></td>
                <td><?php echo $row->tax_pension_related; ?></td>
                <td><?php echo $row->others; ?></td>
                <td><?php echo $row->deadline; ?></td>
                <td><?php	if ($row->paid==1) {
                    echo "<td>Paid</td>";
                }else{
                    echo "<td>not paid </td>";
                }
            ?></td>
                    </tr>
                </table>
                <?php 
            }
            else{
                echo "Info Does not exist";
            }
        }
        ?>
    </body>
</html>
