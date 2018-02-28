<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Homework 2 </title>
        <link href="/Assaignments/Homework2/CSS1/styles2.css" rel="stylesheet" type="text/css" />
    </head>
    
    
    <body>
        <header> 
            <h1>Welcome To EatNow!</h1>
            <h2>To place your order simply fill out the required information</h2>
        </header>


    <form method= "post" action ="/Assaignments/Homework2/index2.php"> 
    <!--/////NAME & NUMBER//////////////////////////////////////////////////////////////////////////-->

      Name:<br> 
        <input type="text" name="customer";/><br>
      Phone Number:<br>
        <input type="text" name ="number";/><br>
        <br>
<!--//////////PICK UP? DELIVERY/////////////////////////////////////////////////////////////////////-->
        <br> 
        <input type="radio" name="pickDeliv" value="delivery" id="delivery">
        <label for="delivery">Delivery</label> 
        <br>
        <input type="radio" name="pickDeliv" value="pickUp" id="pick-up">
        <label for="pick-up">Pick-Up</label> <br><br>
<!--///////////MENU////////////////////////////////////////////////////////////////////-->
<!--//////////MAIN FOOD/////////////////////////////////////////////////////////////////////-->

        <div class= "menu"> MENU</div>
        <br><br>
        FOOD
        <br>
<!--//////////Sandwich/////////////////////////////////////////////////////////////////////-->

        <input type="checkbox" name="food[]" value="sandwich">Sandwich - 10.99
        <select name ="sandwichQuantity[]">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>

<!--//////////Spaghetti/////////////////////////////////////////////////////////////////////-->
<input type="checkbox" name="food[]" value="spaghetti">Spaghetti - 11.99
   
         
        <select name ="spaghettiQuantity[]">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>
<!--//////////FishFillet/////////////////////////////////////////////////////////////////////-->
<input type="checkbox" name="food[]" value="fishFillet">Fish Fillet - 15.99
   
         
        <select name ="fishFilletQuantity[]">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>
        <!--//////////Soup/////////////////////////////////////////////////////////////////////-->
<input type="checkbox" name="food[]" value="soup">Soup - 9.99
   
         
        <select name ="soupQuantity[]">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
      <br>
        
        
        
        <br><br>
    <input type="submit" name ="submitButton" value="Submit";/><br>
    </form>










    </body>
</html>