<?php
if (!session_id()) {
    session_start();
}// connect to the database
 include 'database.php';
  //query connect
 mysql_select_db("");
?>

<html>
    <head>
        <title>Shopping Cart! </title>
    </head>
    <body>
    <div align="center">
    You Cart Currently has
    <?php
    $sessid = session_id();
    
    //whats in our cart
    $query = "SELECT * FROM tempcart WHERE temp_cart_session = '$sessid'";
    $results = mysql_query($query)
        or die(mysql_query());
    $rows = $mysql_num_rows($results);
    echo $rows;
    ?>
    
    product(s) in your cart. <br>
    
    <table border = "1" align="center" cellpadding="5">
        <tr>
            <td>Quantity</td>
            <td>Item IMages</td>
            <td>Item Name</td>
            <td>Price Each</td>
            <td>Extended Price</td>
            <td></td>
            <td></td>
                  <?php
                  $total = 0;
                  while ($row = mysql_fetch_array($results)) {
                       
                       echo "<tr>";
                       extract ($row);
                       $prod = "SELECT * FROM products " .
                       "WHERE products_prodnum='temp_cart_prodnum'";
                       $prod2 = mysql_query($prod);
                       $prod3 = mysql_fetch_array($prod2);
                       extract ($prod3);
                       echo "<td>
                       <form method=\"POST\" action=\"modcart.php?action=change\">
                       <input type=\"hidden\" name=\"modified_hidden\"value=\"$tempcart_hidden\">
                       <input type=\"text\" name=\"modified_quan\" size=\"2\" value=\"$temp_cart_quan\">";
                       
                       echo "</td>";
                       echo"<td>";
                       echo"<a href=\"getprod.php?prodid=" . $products_prodnum . "\" >";
                       echo "THUMBNAIL<br>IMAGE</a></td>";
                       echo"<a href=\"getprod.php?prodid=" . $products_prodnum . "\" >";
                       echo $products_name;
                       echo "</a></td>";
                       echo "<td align=\"right\">";
                       echo $products_price;
                       echo "</td>";
                       echo "<td align\"right\">";
                       
                       $extprice = number_format($products_price * $temp_cart_quan, 2);
                       echo $extprice;
                       echo "</td>";
                       echo "<td>";
                       echo "<input type=\"submit\" name=\"Submit\" value=\"Change QTY\">
                       </form></td>";
                       
                       echo "<td>";
                       echo "<form method=\"POST\" action=\"modcart.php?action=delete\">
                       <input type=\"hidden\" name=\"modified_hidden\"value=\"$tempcart_hidden\">";
                       echo  "<input type=\"submit\" name=\"Submit\" value=\"Delete Item\">;
                       </form></td>";
                       echo "</tr>";
                       
                       $total = $extprice + $total;
                       
                      }
                      
                     ?>
                     <tr>
                         <td colspan=\"4\" align=\"right\">
                             Your total cost before shipping is: </td>
                             <td align=\*right\"> <?php echo number_format($total,2); ?></td>
                             <td></td>
                             <td>
                             <?php
                              echo "<form method=\"POST\" action=\"modcart.php? action=empty\">
                              <input type=\"hidden\" name=\"modified_hidden\"value=\"$tempcart_hidden\" value=\" ";
                              if (isset($tempcart_hidden)) {
                                  echo $tempcart_hidden;
                              }
                              echo "\">";
                              echo "<input type=\"submit\" name=\" name=\"Submit\" value=\"Empty Cart\"></form>";
                              
                              ?>
</td>
</tr>
</table>
<form method="POST" action="checkout.php">
<input type="submit" name="Submit" value="Proceed to Checkout">;
</form>
<a href="ourstore.php">HOME</a>
</div>
</body>
</html>