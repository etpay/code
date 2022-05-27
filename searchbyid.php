<?php
include 'auth_session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search you info</title>
	<style>
.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}

</head>
<body>
		
    <form method="post">
		<div class="form-group">
        <label>Search By Id</label>
        <input class="form-control" type="text" name="search">
		</div><br>
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
