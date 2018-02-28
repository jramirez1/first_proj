<?php

    session_start();
    
    if($_POST['submitButton'])
    {
        if($_POST['customer'] != "")
        {
            if($POST['customer'] != "0")
            {
                $_SESSION['customer_session'] = $_POST['customer'];
            }
        }
        else{
            echo '<div id="error">NO NAME, GO BACK</div>';
        }
    }

    $customer_session = $_SESSION['customer_session'];
    
    
    
 
    
    if($_POST['submitButton'])
    {
        if($_POST['number'] != "")
        {
            if($POST['number'] != "0")
            {
                $_SESSION['number_session'] = $_POST['number'];
            }
        }
        else{
            echo '<div id="error">NO PHONE NUMBER, GO BACK</div>';
        }
    }

    $number_session = $_SESSION['number_session'];
   
   
   
   if($_POST['submitButton'])
    {
        if($_POST['pickDeliv'] != "")
        {
            if($POST['pickDeliv'] != "0")
            {
                $_SESSION['pickDeliv_session'] = $_POST['pickDeliv'];
            }
        }
    }
   $pickDeliv_session = $_SESSION['pickDeliv_session'];
   
   
   if(!(isset($_POST['pickDeliv'])))
   {
       echo '<div id="error">NO ORDER STYLE CHOSEN, GO BACK</div>';
   }
   
   
   
   
   
   
 
   
   if($_POST['submitButton'])
    {
        if($_POST['spaghettiQuantity'] != "")
        {
            if($_POST['spaghettiQuantity'] != "0")
            {
                $_SESSION['spaghettiQuantity'] = $_POST['spaghettiQuantity'];
            }
        }
    }
   $spaghettiQuantity_session = $_SESSION['spaghettiQuantity'];
   
   
   
   
   
   
   
   
    //echo ($customer_session);
    //echo "<br>";
    //echo ($number_session);
    //echo "<br>";
    //echo ($pickDeliv_session);
    //echo "<br>";
    if(!(isset($_POST['food'])))
    {
        echo '<div id="error">NO FOOD SELECTED, GO BACK</div>';
    }
    else{
    foreach($_POST['food'] as $selected){
        $selected."</br>";
    }}
    
    
     
    
     
      
    foreach($_POST['sandwichQuantity'] as $sQuantity)
    {
        $sQuantity."</br>";
    }
    
    foreach($_POST['spaghettiQuantity'] as $siQuantity){
         $siQuantity."</br>";
            }
    
    foreach($_POST['fishFilletQuantity'] as $fQuantity){
     $fQuantity."</br>";
    }
    foreach($_POST['soupQuantity'] as $spQuantity){
     $spQuantity."</br>";
    }
    
    
    
    
    if(isset($_POST["food"]))
    {
        $foods = $_POST['food'];
        $c = count($foods);
        $sPrice = 0.0;
        $siPrice=0.0;
        $fPrice=0.0;
        $spPrice=0.0;
        
        for($i = 0; $i < $c ; $i++)
        {
            if($foods[$i] == sandwich)
            {
                $sPrice =$sPrice+ (10.99*$sQuantity);
                
            }
            if($foods[$i] == spaghetti)
            {
                $siPrice = $siPrice+(11.99*$siQuantity);
                
            }
            if($foods[$i] == fishFillet)
            {
                $fPrice =$fPrice+(15.99*$fQuantity);
                
            }
            if($foods[$i] == soup)
            {
                $spPrice = $spPrice+(9.99*$spQuantity);
                
            }
        }
    }
    $price = $sPrice+$siPrice+$fPrice+$spPrice;
    
    
       
        
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //echo $price;
     echo "<br>";
    $tax = .0875;
    
    //$foodTax=0.0;
    
    $foodTax=$tax*$price;
    
    //$total=0.0;
    
    $total = $price+($foodTax);
    
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Homework 2 </title>
        <link href="/Assaignments/Homework2/CSS1/styles2.css" rel="stylesheet" type="text/css" />
        <title> </title>
    </head>
    <body>
        <!--                -->
        
        
  <div id="invoice-POS">
    
        <center id="top">
             <h2>EatNow</h2>
                 <div class="info">
                    <h2>Receipt</h2>
                        
                           New York, New York
                        
                </div><!--End Invoice Mid-->
        </center><!--End InvoiceTop-->
    
   
      
    
    <div id="bot">

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="item"><h2>Item</h2></td>
								<td class="Hours"><h2>Qty</h2></td>
								<td class="Rate"><h2>Sub Total</h2></td>
							</tr>
							
							
							
                                <?php 
                                    $c = count($foods);
                                for($i = 0; $i < $c ; $i++)
                                  {
                                      if(($foods[$i] == 'sandwich'))
                                      {
                                          if( $sQuantity != 0)
                                          {
                                                echo "<tr class='service'>";
                								echo "<td class='tableitem'><p class='fname'>Sandwich</p></td>";
                								echo "<td class='tableitem'><p class='qty'>$sQuantity</p></td>";
                								echo "<td class='tableitem'><p class='itemtext'>$sPrice</p></td>";
                						    	echo "</tr>";
                                          }
                                      }
                                      if(($foods[$i] == 'spaghetti'))
                                      {
                                          if( $siQuantity != 0)
                                          {
                                                echo "<tr class='service'>";
                								echo "<td class='tableitem'><p class='fname'>Spaghetti</p></td>";
                								echo "<td class='tableitem'><p class='qty'>$siQuantity</p></td>";
                								echo "<td class='tableitem'><p class='itemtext'>$siPrice</p></td>";
                						    	echo "</tr>";
                                          }
                                      }
                                      if(($foods[$i] == 'fishFillet'))
                                      {
                                          if( $sQuantity != 0)
                                          {
                                                echo "<tr class='service'>";
                								echo "<td class='tableitem'><p class='fname'>Fish Fillet</p></td>";
                								echo "<td class='tableitem'><p class='qty'>$fQuantity</p></td>";
                								echo "<td class='tableitem'><p class='itemtext'>$fPrice</p></td>";
                						    	echo "</tr>";
                                          }
                                      }
                                      if(($foods[$i] == 'soup'))
                                      {
                                          if( $sQuantity != 0)
                                          {
                                                echo "<tr class='service'>";
                								echo "<td class='tableitem'><p class='fname'>Soup</p></td>";
                								echo "<td class='tableitem'><p class='qty'>$spQuantity</p></td>";
                								echo "<td class='tableitem'><p class='itemtext'>$spPrice</p></td>";
                						    	echo "</tr>";
                                          }
                                          
                                          
                                      }
                                      
                                  }
                                  
                                  
                                
                                ?>
							

			

							<tr class="tabletitle">
								<td></td>
								<td class="Rate"><h2>tax</h2></td>
								<td class="payment"><h2><?php echo number_format($foodTax,2) ?></h2></td>
							</tr>

							<tr class="tabletitle">
								<td></td>
								<td class="Rate"><h2>Total</h2></td>
								<td class="payment"><h2> $<?php echo number_format($total,2) ?></h2></td>
							</tr>
                           
						</table> 
						
						
						        <center id="bottom">
						            Thank You!
						          
                                    <div>Customer Copy</div>
                                </center>
                                
                                
                            
					</div><!--End Table-->

					

				</div><!--End InvoiceBot-->
  </div><!--End Invoice-->

        
        
        
        
        
        
        
        
        
         <!--                -->
        <form>
              <input type="button" value="Go back!" onclick="history.back()">
        </form>
    </body>
</html>