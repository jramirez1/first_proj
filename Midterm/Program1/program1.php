<?php
     session_start();
     if ('POST' === $_SERVER['REQUEST_METHOD']) 
    {
        $rows = $_POST['rows'];
        $columns = $_POST['cols'];
    }
    
    echo ($rows);
    echo ($columns);
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>CST 336 Midterm Spring 2018</title>
  <meta name="description" content="">
  <meta name="author" content="Miguel Lara">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <style>
  	#wrapper{
  	  width:800px;
  	  margin:0 auto;	
  	}
  </style>
</head>

<body>
  <div id="wrapper">
    <header>
      <h1>Aces vs Kings</h1>
    </header>
    <div id="game">
     <form method="post" action = "program1.php" >
     	Number of Rows: <input type="text" name="rows" value=<?php echo ($rows) ?>><br /><br />
     	Number of Columns: <input type="text" name="cols" value=<?php echo ($columns) ?>><br /><br />
     	Suit to omit: <select name="omitSuit">
     		           <option value="1">Hearts</option>
     		           <option value="2">Clubs</option>
     		           <option value="3">Diamonds</option>
     		           <option value="4">Spades</option>
     		           </select>

     	<input type="submit">
     </form>
      <br /><br />
     
     
              <?php
              
              $arrLength = $columns * $rows;
                    $cards = range(1, 52);
                    shuffle($cards);
                    for($ix = 0; $ix < $arrLength; $ix++ )
                    {
                        if($cards[$ix] >=1 && $cards[$ix]<=13 ){
                            echo ("clubs");
                            echo ("<br>");
                        }
                        if($cards[$ix] >= 14 && $cards[$ix] <=26  ){
                            echo ("hearts");
                            echo ("<br>");
                        }
                        if($cards[$ix] >= 27 && $cards[$ix] <= 39 ){
                            echo ("diamonds");
                            echo ("<br>");
                        }
                        if($cards[$ix] >= 40 && $cards[$ix] <= 52 ){
                            echo ("spades");
                            echo ("<br>");
                        }
                        
                    }
                        
                        
                    
              
              
              
              print_r ($cards);
              
              
              
              
              
              
              echo "<table border='1'>";
 
                    for($i=0;$i<$rows;$i++) {
                        echo "<tr>";
                            for($j=0;$j<$columns;$j++) 
                            {
                                if($cards[$j] >=1 && $cards[$j]<=13 ){
                                    echo "<th>"."clubs"."</th>";
                                    
                                }
                                else if($cards[$j] >=14 && $cards[$j]<=26 ){
                                    echo "<th>"."hearts"."</th>";
                                }
                               else if($cards[$j] >=27 && $cards[$j]<=39 ){
                                    echo "<th>"."diamonds"."</th>";
                                }
                                else if($cards[$j] >=40 && $cards[$j]<=52 ){
                                    echo "<th>"."spades"."</th>";
                                }
                                
                            }
                                    echo "</tr>";
                                
                     
                            }
                     
                                echo "</table>";
              
             /* echo "<table border='1'>";
 
                    for($i=0;$i<$rows;$i++) {
                        echo "<tr>";
                            for($j=0;$j<$columns;$j++) {
                                echo "<th>"."r".$i."c".$j."</th>";
                            }
                     
                                echo "</tr>";
                     
                            }
                     
                                echo "</table>";
                     */
                    
                
              
              
              ?>
              
              
              
              <br /><br /> Number of Aces: 2 <br /> 
              Number of Kings: 2<h1> Tie - No winner</h1>
              </div>
    </div>
    <footer>
    </footer>
  </div>

</body>
</html>