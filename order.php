<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Order Page">
    <meta name="author" content="Paul Northrup and Everardo Mendoza">

    <title>Carter's Catering Order</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
</head>
<body>
    
<!--Header + Logo Start-->  
  
  <header class="container">
    <div class="row">
      <img id="logo" class="col-sm-3" src="/Images/Logo.JPG"/>
      <h1 id="title" class="col-sm-9 text-center">Carter's Catering</h1>
    </div>
  </header>
  
    
<!--Header + Logo End-->

<!--Navigation Bar Start-->    
  <section class="container">  
    <nav class="col-sm-3 text-center">
        <a href="home.html"> <p id="Home">Home</p> </a>
        <a href="menu.html"> <p id="Menu">Menu</p> </a>
        <a href="order.php"> <p id="Order">Order</p> </a>
        <a href="specials.html"> <p id="Specials">Specials</p> </a>
        <a href="catering.php"> <p id="Catering">Catering</p> </a>
        
        <a href="contact.html"> <p id="Contacts">Contacts</p> </a>
        
    </nav>
    <div class="col-sm-9">
        <h2>Order Request</h2>
  
        <p>Required fields are marked with an asterisk *.</p> 
        
        <!-- PHP -->
        <?php
          // sends message if the submit button is pressed  
          if (isset($_POST['submit'])) {
            
            // prepares the customer's information
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $phone = $_POST['phone'];
            $address = $_POST['Address'];
            
            // prepares the email address
            $mailto = "juniormendoza2012@icloud.com";
            
            // creates the email subject
            $subject = "Order From  " . $firstName . " " . $lastName;
            
            // prepares all of the quantities and specifications of items
            if (empty($_POST['BahamaMama'])) {
              $bahamaMama = $_POST['BahamaMama'];
            } else {
              $bahamaMama = 0;
            }
            $bahamaMamaNotes = $_POST['BahamaMamaNotes'];
            
            if (empty($_POST['COTR'])) {
              $COTR = $_POST['COTR'];
            } else {
              $COTR = 0;
            }
            $COTRNotes = $_POST['COTRNotes'];
            
            if (empty($_POST['FCOTR'])) {
              $FCOTR = $_POST['FCOTR'];
            } else {
              $FCOTR = 0;
            }
            $FCOTRNotes = $_POST['FCOTRNotes'];
            
            if (empty($_POST['GCOTR'])) {
              $GCOTR = $_POST['GCOTR'];
            } else {
              $GCOTR = 0;
            }
            $GCOTRNotes = $_POST['GCOTRNotes'];
            
            if (empty($_POST['LPC'])) {
              $LPC = $_POST['LPC'];
            } else {
              $LPC = 0;
            }
            $LPCNotes = $_POST['LPCNotes'];
            
            if (empty($_POST['BLT'])) {
              $BLT = $_POST['BLT'];
            } else {
              $BLT = 0;
            }
            $BLTNotes = $_POST['BLTNotes'];
            
            if (empty($_POST['PCS'])) {
              $PCS = $_POST['PCS'];
            } else {
              $PCS = 0;
            }
            $PCSNotes = $_POST['PCSNotes'];
            
            if (empty($_POST['TE'])) {
              $TE = $_POST['TE'];
            } else {
              $TE = 0;
            }
            $TENotes = $_POST['TENotes'];
            
            if (empty($_POST['MBP'])) {
              $MBP = $_POST['MBP'];
            } else {
              $MBP = 0;
            }
            $MBPNotes = $_POST['MBPNotes'];
            
            if (empty($_POST['PLAV'])) {
              $PLAV = $_POST['PLAV'];
            } else {
              $PLAV = 0;
            }
            $PLAVNotes = $_POST['PLAVNotes'];
            
            if (empty($_POST['Breakfast'])) {
              $breakfast = $_POST['Breakfast'];
            } else {
              $breakfast = 0;
            }
            $breakfastNotes = $_POST['BreakfastNotes'];
            
            if (empty($_POST['Desserts'])) {
              $desserts = $_POST['Desserts'];
            } else {
              $desserts = 0;
            }
            $dessertsNotes = $_POST['DessertsNotes'];
            
            // creates the email message
            $message = $firstName . " " . $lastName . " has placed an order for: " . $bahamaMama . " Bahama Mamas " . $bahamaMamaNotes . ", " . $COTR . " Chicken on the Runs " . $COTRNotes . ", " . $FCOTR . " Fried Chicken on the Runs " . $FCOTRNotes . ", " . $GCOTR . " Grilled Chicken on the Runs " . $GCOTRNotes . ", " . $LPC . " Lemon Pepper Chickens " . $LPCNotes . ", " . $BLT . " Turkey BLT's and Chips " . $BLTNotes . ", " . $PCS . " Philly Cheese Steaks " . $PCSNotes . ", " . $TE . " Taco Explosions " . $TENotes . ", " . $MBP . " Motherload Baked Potatoes " . $MBPNotes . ", " . $PLAV . " Plate Lunches and Vegetables " . $PLAVNotes . ", " . $breakfast . " breakfast orders " . $breakfastNotes . ", " . $desserts . " dessert orders " . $dessertsNotes . ". " . "Their address is " . $address . " and their phone number is " . $phone . ".";
            
            $finalmsg = wordwrap($message, 70,"<br>\n");
            
            // sends the email
            mail($mailto, $subject, $message);
            
            // alerts the customer that the email has been sent
            echo "<script type='text/javascript'>alert('Your order has been placed!');</script>";
            
          }
        ?>

        <form method="post" id="order_form" name="order_form"  action="order.php">
<!--Personal Info Tabs-->          
          <div>
            <label for="firstName">*First Name:       </label>
            <input type="text" name="firstName" id="firstName" maxlength="100" />
            <div class="error" id="firstNameError"></div>
          </div>
          
          <div>
            <label for="lastName">*Last Name:       </label>
            <input type="text" name="lastName" id="lastName" maxlength="100" />
            <div class="error" id="lastNameError"></div>
          </div>
          
          <div>
            <label for="phone">*Phone:       </label>
            <input type="text" name="phone" id="phone" maxlength="100" />
            <div class="error" id="phoneError"></div>
          </div>

          <div>
            <label for="Address">*Address:       </label>
            <input type="text" name="Address" id="Address" maxlength="100" />
            <div class="error" id="AddressError"></div>
          </div>
    </div>
  </section>
<!--Vertical Page Identifier-->
  <section>
    <div class="container">
      <div class="col-sm-3 text-center">
        <p id="VI">O<br><br>R<br><br>D<br><br>E<br><br>R</p>
      </div>
    
<!--Order System HTML-->    
      <div class="col-sm-9">
<!--Food Item Table-->
            <table>
              <tr>
                <th>PRODUCT</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>TOPPINGS WANTED/NOT WANTED</th>
              </tr>
              
              <tr>
                <td>Bahama Mama</td>
                <td class="text">Freshly cut lettuce topped with a sweet thinly sliced chicken and juicy pineapples, sided with fresh tomatoes, cheese, mouth watering cucumbers, hardboiled eggs, and carrots.</td>
                <td>$12.00</td>
                <td><input type="text" name="BahamaMama" id="BahamaMama" maxlength="3" value="" data-cost="12" class="productQuantity" /></td>
                <td><input type="text" name="BahamaMamaNotes" value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Chicken on the Run (Barbecue or Buffalo)</td>
                <td class="text">Freshly cut lettuce topped with freshly cooked barbecue or buffalo chicken, sided with fresh tomatoes, cheese, mouth watering cucumbers, hardboiled eggs, and carrots.</td>
                <td>$10.00</td>
                <td><input type="text" name="COTR" id="COTR" maxlength="3" value="" data-cost=10 class="productQuantity" /></td>
                <td><input type="text" name="COTRNotes" value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Fried Chicken on the Run</td>
                <td class="text">Enjoy our nationally-recognized, fresh-picked MacIntosh apples. Great for eating or baking.</td>
                <td>$12.00</td>
                <td><input type="text" name="FCOTR" id="FCOTR" maxlength="3" value="" data-cost=12 class="productQuantity" /></td>
                <td><input type="text" name="FCOTRNotes" value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Grilled Chicken on the Run</td>
                <td class="text">A fresh bed of spinach with long thin strips of grilled chicken, sided with fresh tomatoes, cheese, mouth watering cucumbers, hardboiled eggs, and carrots.</td>
                <td>$10.00</td>
                <td><input type="text" name="GCOTR" id="GCOTR" maxlength="3" value="" data-cost=10 class="productQuantity" /></td>
                <td><input type="text" name="GCOTRNotes" value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Lemon Pepper Chicken</td>
                <td class="text">Enjoy our nationally-recognized, fresh-picked MacIntosh apples. Great for eating or baking.</td>
                <td>$10.00</td>
                <td><input type="text" name="LPC" id="LPC" maxlength="3" value="" data-cost=10 class="productQuantity" /></td>
                <td><input type="text" name="LPCNotes "value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Turkey BLT's and Chips</td>
                <td class="text">(Call to know more about prices!)</td>
                <td>(Prices Vary)</td>
                <td><input type="text" name="BLT" id="BLT" maxlength="3" value="" data-cost=10 class="productQuantity" /></td>
                <td><input type="text" name="BLTNotes" value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Pilly Cheese Steaks</td>
                <td class="text">Thin steak strips cooked to perfection in a soft italian bread bun topped with our delicious homemade cheese sauce.(Call to know more about prices!)</td>
                <td>(Prices Vary)</td>
                <td><input type="text" name="PCS" id="PCS" maxlength="3" value="" data-cost=10 class="productQuantity" /></td>
                <td><input type="text" name="PCSNotes" value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Taco Explosion</td>
                <td class="text">(Call to know more about prices!)</td>
                <td>$13.00</td>
                <td><input type="text" name="TE" id="TE" maxlength="3" value="" data-cost=13 class="productQuantity" /></td>
                <td><input type="text" name="TENotes" value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Motherload Baked Potato</td>
                <td class="text">Your choice of toppings: Grilled Chicken, Smoked Chicken, Turkey Chili, Bacon Bits, Broccoli, Butter, Cheese, Chives, Sour Cream.(Call to know more about prices!)</td>
                <td>(Prices Vary)</td>
                <td><input type="text" name="MBP" id="MBP" maxlength="3" value="" data-cost="(Prices Vary)" class="productQuantity" /></td>
                <td><input type="text" name="MBPNotes" value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Plate Lunches and Vegetables</td>
                <td class="text">Fresh vegetable platter including broccoli, baby tomatoes, watery celery, and freshly sliced cucumbers.(Call to know more about prices!)</td>
                <td>(Prices Vary)</td>
                <td><input type="text" name="PLAV" id="PLAV" maxlength="3" value="" data-cost="(Prices Vary)" class="productQuantity" /></td>
                <td><input type="text" name="PLAVNotes" value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Breakfast</td>
                <td class="text">Call to know what we're serving!</td>
                <td>(Prices Vary)</td>
                <td><input type="text" name="Breakfast" id="Breakfast" maxlength="3" value="" data-cost=10 class="productQuantity" /></td>
                <td><input type="text" name="BreakfastNotes" value="" class="productNotes"></td>
              </tr>
              
              <tr>
                <td>Desserts</td>
                <td class="text">Call to know what we're serving!</td>
                <td>(Prices Vary)</td>
                <td><input type="text" name="Desserts" id="Desserts" maxlength="3" value="" data-cost=10 class="productQuantity" /></td>
                <td><input type="text" name="DessertsNotes" value="" class="productNotes"></td>
              </tr>
            </table>
            <br>
            <input id="submit" type="submit" name="submit" value="Place Order">
          </form>
      </div>
    </div>
  </section>

    <!--DONT DELETE-->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
