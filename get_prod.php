<?php

//session start...lets look at the detail of our stuff
session_start();

// connect to database
include 'database.php';

//we will make database active
mysql_select_db();

//get the product from the URL
$prodid = $_REQUEST['prodid'];

//query to get info on our product
$query = "SELECT * FROM products where WHERE products_prodnum= '$prodid'";
$results = mysql_query($query)
    or die(mysql_error());
$row = mysql_fetch_array($results);
extract($row);

?>

<html>
    <head>
        <title><?php echo $products_name; ?></title>
    </head>
    <body>
    <div align="center">
        <table cellpadding= "5" width= "90%">
            <tr>
                <td>PRODUCT IMAGE</td>
                <td><strong><?php echo $products_name; ?></strong><br>
                <?php echo $products_prodesc; ?><br \>
                <br>PRODUCT NUMBER:<?php echo $products_prodnum; ?> 
                <br>PRODUCT PRICE: <?php echo $products_price; ?><br>
                <form method="POST" action="modcart.php?action=add">
                    Quantity: <input type="text" name="qty" size="2"><br>
                    <input type="hidden" name= "products_prodnum" 
                    value="<?php echo $products_prodnum; ?>"
                    <input type="submit" name="SUBMIT" value="Add To Cart">
                    </form>
                    <form method="POST" action='cart.php'>
                    <input type="submit" name="SUBMIT" value="View Cart">  
                    </form>
                </td>
             </tr>
        </table>
        <hr width="200">
        <p><a href="ourstore.php">HOME</a></p>
    </div>
    </body>
</html>