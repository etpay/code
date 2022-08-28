<?php
include 'auth_session.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'">
<meta http-equiv="X-Content-Security-Policy" content="default-src 'self'; script-src 'self'">
<meta http-equiv="X-WebKit-CSP" content="default-src 'self'; script-src 'self'">
<title>Yeserasew Payment Services</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search By partner</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form  autocomplete="off"  action="" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <input type="submit" class="button" value="print" onClick="window.print()" />
                                        <a href="admin.php">Back</a> </br>
                                    </div>
                                    
                                
                                </form>

                            </div>
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
                                    if(isset($_POST['search']))
                                    {
                                         require 'db/config.php';
                                        $filtervalues = $_POST['search'];
                                        $query = "SELECT * FROM commit WHERE CONCAT(partner ) LIKE '%$filtervalues%' ";
                                       
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
        </div>
        </div>
        </div>
        </div>
    </body>
</html>
