
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
</head>
<body>
<div class="container">
  <img src="img/header.jpg" alt="Header" style="width:90%;" style= "height:50%">
  <div class="centered">Centered</div>
</div>

<div class="row">
  <div class="column side">
    <h2>CD'S/Records</h2>
  	<img src="img/boombox.jpg" alt="picture of boombox" class="left">
  </div>
  <div class="column middle">
    <h1>WHO ARE WE!</h1>
    <p>Matt's Hip-Hop Stop is a special order online store that delivers oldschool cd'd and records.</p>
  </div>
 
  <div class="column ">
    <h2>Hip-Hop Stop</h2>
   	<img src="img/ospos2.jpg" alt="poster" class="left">
  </div>
  </div>
  <br><br>
  <table width="400">
    
    <?php
    //connect to database
      include 'database.php'; 
      
    while ($row =mysql_fetch_array($results)){
      extract ($row);
      echo "<tr><td align=\"center\">";
      echo "<a href=\"getprod.php?prodid=" . $products_prodnum . "\">";
      echo "<em>THUMBNAIL<br>IMAGE</em></a></td>";
      echo "<td>";
      echo "<a href=\"getprod.php?prodid=" . $products_prodnum . "\">";
      echo $products_name;
      echo "</td></a>";
      echo "<td align=\"right\">";
      echo "<a href=\"getprod.php?prodid=" . $products_prodnum . "\">";
      echo "$" . $products_price;
      echo "</a></td></tr>";
    }
    ?>
  </table>
  </body>
</html>