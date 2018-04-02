<?php

    $filterText = '';

    // We only care about the filter if we are posting back
    if ('POST' === $_SERVER['REQUEST_METHOD']) 
    {
        $filterText = $_POST['filterText'];
    }



    $host = getenv('IP');
    $port = 3306;
    $dbname = 'device_checkout';
    $username = getenv('C9_USER');
    $password = '';
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    
    
    
   
    // Raise error if something is wrong with the connection
  // $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$sql = "SELECT  deviceId AS  device_ID,
                 
                deviceName AS device_name,
                
                deviceType AS device_type,
                
                price AS device_price,
                
                status AS device_status
                
                
        FROM device 
        ";
        
       



    $sql = $sql . "
        WHERE deviceId LIKE CONCAT('%', :filterText, '%')
        OR deviceType LIKE CONCAT('%', :filterText, '%')
        OR status LIKE CONCAT('%', :filterText, '%')
        OR deviceName LIKE CONCAT('%', :filterText, '%')
        OR price LIKE CONCAT('%', :filterText, '%')
        ";
        


        $stmt = $dbConn->prepare($sql);
        
        $stmt->execute(array(':filterText' => $filterText));
        


?>












<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="img/favicon.png">
        
        <title>Device Checkout</title>
        <!-- Icons -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="lab4CSS/lab4styles.css" rel="stylesheet" type="text/css" />
        <link href="css/flag-icon.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/simple-line-icons.css" rel="stylesheet">
        
        <!-- Main styles for this application -->
        <link href="css/style.min.css" rel="stylesheet">
        <!-- Styles required by this views -->
 
       
    </head>
    
    
    
    
    
    
    
    <body>
        <div class= "name"> 
                Device Checkout 
        
        </div>
        
        
        
        
        <main class="main">
            <div class="container-fluid">

              <!--CODE FOR TUTORIAL HERE-->
        <style>
            .filter-area{
              margin-top:20px;
              margin-bottom:20px;
            }
        </style>

    
    <form action="lab4Index.php" method="POST">
            <div class="input-group filter-area">
                
                <input type="text" name="filterText" class="form-control"aria-label="Text input with segmented dropdown button">
            
                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-outline-secondary">
                </div>
            
            </div>
    </form>

                    
                    
                    
                    
                    
                    
 <?php
        // Process the results
        // http://php.net/manual/en/pdostatement.rowcount.php
        if ($stmt->rowCount() > 0) {
            echo '<table class="table">';
            echo '<thead>';
            echo '  <tr>';
            echo '    <th scope="col">Device Name</th>';
            echo '    <th scope="col">Device Type</th>';
            echo '    <th scope="col">Device Availability</th>';
            echo '    <th scope="col">Device Price</th>';
            echo '    <th></th>';
            echo '  </tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $stmt->fetch()) {
                // <tr>
                echo '<tr>';

                //   <th scope="row">1</th>
                echo '  <th scope="row">'.$row['device_name'].'</th>';

                //   <td>Otto</td>
                echo '  <td>'.$row['device_type'].'</td>';

                //   <td>@mdo</td>
                echo '  <td>'.$row['device_status'].'</td>';
                //
                
                echo '  <td>'.$row['device_price'].'</td>';


            
            }
        } else {
            echo '<tr><td colspan="5">No Charges Found</td></tr>';
        }

        // End the table
        echo '</tbody>';
        echo '</table>';
      ?>
      
      
      
              <!--END OF CODE FOR TUTORIAL-->
            </div>
            <!-- /.container-fluid -->
          </main>
        </div>
        <!-- /.app-body -->
              
      



    </body>
</html>