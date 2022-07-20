<?php
include 'auth_session.php';
?>
<!doctype html>
<html lang="en">
<head>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Yeserasew Payment Services</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search By date</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="date" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <input type="submit" class="button" value="print" onClick="window.print()" />
                                        <a href="admin.php">Back</a> </br>
                                    </div>
                                    
    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>partner</th>
                                    <th>electric</th>
                                    <th>telecom</th>
                                    <th>water</th>
                                    <th>house_related</th>
                                    <th>tax_pension_related</th>
                                    <th>others</th>
                                    <th>total</th>
                                  
                                
                                 
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","p1");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM commit WHERE CONCAT(deadline ) LIKE '%$filtervalues%' ";
                                       
                                        $query_run = mysqli_query($con, $query);
                                       
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                $total = ($items['electric'] + $items['telecom'] + $items['water']+$items['house_related'] + $items['tax_pension_related'] + $items['others']) ;
                                               
                                                ?>
                                                <tr>
                                                    <td><?= $items['partner']; ?></td>
                                                    <td><?= $items['electric']; ?></td>
                                                    <td><?= $items['telecom']; ?></td>
                                                    <td><?= $items['water']; ?></td>
                                                    <td><?= $items['house_related']; ?></td>
                                                    <td><?= $items['tax_pension_related']; ?></td>
                                                    <td><?= $items['others']; ?></td>
                                                    <td><?=  $total ; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        
 

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
