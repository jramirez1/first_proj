   <?php
   
    
    $host = getenv('IP');
    $port = 3306;
    $dbname = 'midterm';
    $username = getenv('C9_USER');
    $password = '';
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    
    
    
   
    // Raise error if something is wrong with the connection
   $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $sql = "SELECT  m_students.firstName, m_students.lastName
    FROM  m_students
    ORDER BY lastName ASC";
    
    
     $stmt = $dbConn->prepare($sql);
        
    $stmt->execute();
   
   
   ?>
   
   
   
   
   <!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="img/favicon.png">
        
        <title>midterm</title>
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
 
        <main class="main">
            <div class="container-fluid">

              <!--CODE FOR TUTORIAL HERE-->
        <style>
            .filter-area{
              margin-top:20px;
              margin-bottom:20px;
            }
        </style>
            
 <?php
        
       //TEST
       
       echo '<table class="table">';
            echo '<thead>';
            echo '  <tr>';
            echo '    <th scope="col">First Name</th>';
            echo '    <th scope="col">Last Name</th>';
            echo '    <th></th>';
            echo '  </tr>';
            echo '</thead>';
            echo '<tbody>';
if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                // <tr>
                echo '<tr>';
                //   <th scope="row">1</th>
                echo '  <th scope="row">'.$row['firstName'].'</th>';
                //   <td>Otto</td>
                echo '  <td>'.$row['lastName'].'</td>';
                //   <td>@mdo</td>
            
            }
        } else {
            echo '<tr><td colspan="5">No Record Found</td></tr>';
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