<?php
// connect to our mysql database server

function getDatabaseConnection() {
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "bb108e997bcdab";
    $password = "7b071f8b";
    $dbname = "heroku_3d24ca78bc82e88"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
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
<h1></h1>
<link href="css/styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="header">
  <img src="img/header.jpg" /> <span class="title">MATT'S Hip Hop Stop</span>
</div>


<div class="row">
  <div class="column side">
    <h2>CD'S/Records</h2>
  	<img src="img/boombox.jpg" alt="picture of boombox" class="left">
  </div>
  <div class="column middle">
    <h1>WHO ARE WE!</h1>
    <p>Matt's Throwback CD's is a special order online store that delivers, music, posters and old school gear.</p>
  </div>
 
  <div class="column ">
    <h2>Hip-Hop Stop</h2>
   	<img src="img/ospos2.jpg" alt="poster" class="left">
  </div>
  
</div>
  
</body>
</html>