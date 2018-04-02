
<?php
    $filterText = '';
    // We only care about the filter if we are posting back
    if ('POST' === $_SERVER['REQUEST_METHOD']) 
    {
        $filterText = $_POST['filterText'];
        $searchType = $_POST['searchType'];
    }
    
    echo ($filterText);
    echo ($searchType);
    
    
    include 'database.php'; 
      $dbconn = getDatabaseConnection();
      $dbconn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    

     //sql statemen
       /*$sql = "SELECT  `Matt's_Inventory`.inventory_id,`Matt's_Inventory`.price,`Matt's_Inventory`.quantity,`Album`.album_name
              FROM  `Matt's_Inventory` 
              INNER JOIN  `Album` 
              ON  `Matt's_Inventory`.album_id =  `Album`.album_id";
              */
             $sql = "SELECT inventory_id,album_name, quantity, price
                FROM  `Matt's_Inventory` 
                NATURAL RIGHT OUTER JOIN  `Album`";
              
              
              
              
           
              
            if($searchType == inventory) {
                
                $sql = $sql . "WHERE inventory_id LIKE $filterText";
                
            }
            if($searchType == price) {
                
                $sql = $sql . "WHERE price LIKE $filterText";
                
            }
            if($searchType == quantity) {
                
                $sql = $sql . "WHERE quantity LIKE $filterText";
                
            }
            if($searchType == album) {
                
                $sql = $sql . "WHERE album_name LIKE '%$filterText%'";
                
            }
              
              
              
              
              
              
              
       // sql filter
       /*$sql = $sql . "
        WHERE `Matt's_Inventory`.inventory_id LIKE CONCAT('%', :filterText, '%')
        OR price LIKE CONCAT('%', :filterText, '%')
        OR quantity LIKE CONCAT('%', :filterText, '%')
        OR album_name LIKE CONCAT('%', :filterText, '%')
        "; */
              
      //prepare for sql
      $stmt = $dbconn->prepare($sql);
     $stmt->execute(array(':filterText' => $filterText));
      
      
      
      // The results of teh query
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Team Project CST336</title>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">





<style>

body {
  margin: 0;
}

/* Style the header */
.header {
    background-color: #000000;
    padding: 10px;
    text-align: center;
}

.column {
    float: left;
    padding: 10px;
}

.column.side {
    width: 25%;
}


.column.middle {
    width: 50%;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}
</style>

<link href="css/styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container">
  <img src="img/header.jpg" alt="Header" style="width:90%;" style= "height:50%">
  <div class="centered">Centered</div>
</div>

<div class="row">
  <div class="column side">
    <h2>CD'S/Records</h2>
  	<img src="img/abba.jpg" alt="picture of abba" class="left">
  </div>
  <div class="column middle">
    <h1>WHO ARE WE!</h1>
    <p>Matt's Record's is a special order online store that delivers oldschool cd'd and records.</p>
  </div>
 
  <div class="column ">
    <h2>The Best Clasasic Albums</h2>
   	<img src="img/eltonjohn.jpg" alt="picture of elton john" class="right">
  </div> 	
  <br><br>
  
  
  <!-- code for form and submit, filter data -->
  
  
  
             
           
  
  
  
  
  
  
  
  <form action="ourstore.php" method="POST">
            <div class="input-group filter-area">
                
                 <select name="searchType">
                        <option value="sType">Search Type</option>
                        <option value="inventory">Inventory</option>
                        <option value="album">Album</option>
                        <option value="price">Price</option>
                        <option value="quantity">Quantity</option>
              </select>
              <br><br>
                
                
                <input type="text" name="filterText" class="form-control"aria-label="Text input with segmented dropdown button">
            
                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-outline-secondary">
                </div>
            
            </div>
    </form>
  
  
  <table width="400" align="center">
    <tr>
      <td>inventory_id</td>
       <td>albumname</td>
        <td>price</td>
         <td>quantity</td>
    </tr>
    
    <?php
      // The results of teh query
      if ($stmt->rowCount() > 0){
        while($row=$stmt->fetch()){
          echo "<tr>";
          echo "<td>". $row ['inventory_id'].str_repeat('&nbsp;', 1). "</td>";
          echo "<td>". $row ['album_name'].str_repeat('&nbsp;',1). "</td>";
          echo "<td>". $row ['price'].str_repeat('&nbsp;', 1). "</td>";
          echo "<td>". $row ['quantity'].str_repeat('&nbsp;', 1). "</td>";
          echo"</tr>";
        }
      }
      else{
        echo "nothing found";
      }
      
   ?>
  </table>
  </body>
</html>