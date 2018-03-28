<?php

    $filterText = '';

    // We only care about the filter if we are posting back
    if ('POST' === $_SERVER['REQUEST_METHOD']) 
    {
        $filterText = $_POST['filterText'];
    }
?>






<!DOCTYPE html>
<html lang="en">
<head>
<title>Team Project CST336</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">







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
  
  
  <table width="400" align="center">
    <tr>
      <td>inventory_id</td>
       <td>albumname</td>
        <td>price</td>
         <td>quantity</td>
    </tr>
    
    
    <form action="ourstore.php" method="POST">
            <div class="input-group filter-area">
                
                <input type="text" name="filterText" class="form-control"aria-label="Text input with segmented dropdown button">
            
                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-outline-secondary">
                </div>
            
            </div>
    </form>
        
    
    <?php
    //connect to database
      include 'database.php'; 
      $dbconn = getDatabaseConnection();
      $dbconn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      //sql statemen
      $sql = " SELECT inventory_id,album_name,price,quantity FROM `Album` NATURAL JOIN `Matt's_Inventory` ";
      //prepare for sql
      $sql = $sql . "WHERE inventory_id LIKE CONCAT('%', :filterText, '%'";
      
      $stmt = $dbconn->prepare($sql);
      
      $stmt->execute(array('filterText'=>$filterText));
      
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