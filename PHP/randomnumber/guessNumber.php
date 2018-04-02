

                <?php
                session_start();
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $guess1 = $_POST["number1"];
                $guess2= $_POST["number2"];
                }
                if ($username == $password) {
                $_SESSION["number1"] = $guess1;
                 header('Location: '. 'guessNumber.php');
                exit();
                }
                
                
                $min = 1;
                $max =10;
                $guess1;
                $guess2;
                
                $num1= rand (  $min , $max );
                
                $num2= rand (  $min , $max );
                echo $guess1;
                echo $guess2;
                ?>
                
<!DOCTYPE html>
<html>
    <head>
        <title>Guess the Numbers</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <blockquote>
        <h1> Guess the Numbers </h1>
        <h3> Guess two numbers between 1 and 10!</h3>
        <form method="POST" action="guessNumber.php">
        <form>
            
            Number 1: <input type="text" name="number1"/>
            <br />
            Number: <input type="text" name="number2" />
            <br /><br />
            <input type="submit" value="Guess Numbers" name="guessForm"/>
            <br /><br />
             <input type="submit" value="Give Up" name="giveUp"/>
             <input type="submit" value="Reset" name="reset"/>
            
        </form>
                </blockquote>
    </body>
</html>
                


<?php

if($guess1 > $num1)
    echo "The first number should be lower\n";

if($guess1 < $num1)
    echo "The first number should be higher\n";
    
if($guess2 > $num2)
    echo "The second number should be lower\n";

if($guess2 < $num2)
    echo "The second number should be higher\n";
?>
