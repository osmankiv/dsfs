<?php
## start session
session_start();
## require connection file
require_once "./conn.php"; 

## Check if the cart exists in the session, create it if not
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}


## Check if cashier session variables are not set
if (!isset($_SESSION['cashier_id']) || !isset($_SESSION['cashier_name'])) {
   ## Redirect to cashier error page
   header("Location: ./error_pages/cashier_error.htm");
   exit();
}

## Calculate the total amount of products in cart
$total = 0;
$total_profit=0; 
foreach ($_SESSION['cart'] as $product) {
   @$total += $product['price'] * $product['quantity'];
   @$total_profit+=$product['profit'] * $product['quantity'];
} 
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/style.css" rel="stylesheet">
      <!-- title -->
      <title>السله - الزهراء </title>
      <!-- fav icon -->
      <link rel="shortcut icon" href="./images/shop_logo.png" type="image/x-icon">
      <!-- font awesome cdn link  -->
      <!-- style link -->
      <link rel="stylesheet" href="./styles/dist/cart.css">
   </head>
   <body>
   
      <section class="main-content">
         <!-- page header section starts here -->
         <header class="page-header">
            <div class="img-wrapper">
              <a href="./index.php">
                <img src="./images/shop_logo.png" alt="logo">
              </a>
            </div>

            <div class="cashier_name">
             المحاسب : <?= $_SESSION['cashier_name'] ?> <i class="fas fa-caret-down"></i>

             <a href="./cashier_logout/logout.php" class="cashier_logout">تسجيل خروج</a>
            </div>
         </header> <br/>
         <!-- page header section ends here -->
       
        <div class="calculator">
        <input type="text" title="result" class="display" id="display" readonly>
        <div class="buttons">
         <button onclick="appendNumber('7')">7</button>
         <button onclick="appendNumber('8')">8</button>
         <button onclick="appendNumber('9')">9</button>
         <button onclick="appendOperator('+')">+</button>
         <button onclick="appendNumber('4')">4</button>
         <button onclick="appendNumber('5')">5</button>
         <button onclick="appendNumber('6')">6</button>
         <button onclick="appendOperator('-')">-</button>
         <button onclick="appendNumber('1')">1</button>
         <button onclick="appendNumber('2')">2</button>
         <button onclick="appendNumber('3')">3</button>
         <button onclick="appendOperator('*')">*</button>
         <button onclick="appendNumber('0')">0</button>
         <button onclick="appendOperator('.')">.</button>
        <button  onclick="clearDisplay()">C</button>
         <button onclick="appendOperator('/')">/</button>
          <button class="clear" onclick="calculate()">=</button>
      </div>
      </div>

        <section class="cart-section">

          <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="barcode_form">
            <fieldset>
              <input type="text" name="bar_code" class="bar_code" id="bar_code" required="" autocomplete="off" placeholder="الباركود هنا ...">
             </fieldset> <br/>
             <!-- <fieldset>
              <input type="number" name="quantity" id="quantity" id="quantity" required="" min="1" placeholder="كمية ...">
             </fieldset> -->
           </form>
             <br/><br/>
             <samp class="title">
              سله التسوق
             </samp>
          <br/><br/><br/>

         <section class="cart-detail">
         <div class="cart-wrapper">
               <samp class="product" style="background: #91aecd">
              اسم المنتج
               </samp>
               <samp class="product" style="background: #91aecd">
                سعر المنتج
               </samp>
               <samp class="product" style="background: #91aecd">
                 كمية
               </samp>
             </div> <br/>

         <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
            <div class="cart-wrapper">
               <samp class="product">
               <?= @$product['name']; ?>
               </samp>
               <samp class="product">
                       SD<?= @number_format($product['price']); ?>
               </samp>
               <samp class="product">
                 x <?= @$product['quantity']; ?>
               </samp>

             </div>
             <br/>
           <?php endforeach; ?>
           <br/>

            <!-- total sum of cart items -->  
            <samp class="title" style="font-size: 19px">
               المجموع: <b>SD<?= number_format($total, 2) ?> </b>
              <?php 
              @$_SESSION['total'] = $total;
              @$_SESSION['totalProfit'] =$total_profit;
               ?>
            </samp>
            <br/><br/><br/>

            <!-- form to add more details of product -->
            <form action="./clear_cart.php" method="post">
                <i class="fas fa-barcode"> </i>
               <input type="number" name="change_element" placeholder="Change element given (SD) ...." min="0"  autocomplete="off" step="1" vlaue="0" style="display:none">
                <br/><br/>
                <input type="number" name="change_reminant" placeholder="Change reminant (SD) ...." min="0"  autocomplete="off" step="1" vlaue="0"  style="display:none">
                <br/><br/> 
                <span class="payment-label">نقدي:</span> 
                <input type="radio" name="payment_mode" value="بنكك">

                <span class="payment-label">بنكك:</span> 
                <input type="radio" name="payment_mode"  class="fas fa-ban" value="نقدي"> 
                <br/><br/>
                <!-- <span class="payment-label">Debit card:</span> 
                <input type="radio" name="payment_mode" value="Debit card">  -->
<!-- 
                <span class="payment-label">Credit card:</span> 
                <input type="radio" name="payment_mode" value="Credit card">

               <input type="hidden" name="ip_address" class="ip_address"> --> 
               <input type="hidden" name="clear-cart" value="clear-cart">
               <br/><br/><br/>
               <button type="submit" class="clear-cart">
                  <i class="fas fa-print"></i><span>طباعه</span>
               </button>
            </form><br/>

            <br/><br/><br/>
            <!-- page footer starts here -->
            <footer class="footer">
             الزهراء  <span>&copy;2024 - <?= Date('Y'); ?>.</span>
            </footer>
            <!-- page footer ends here -->
            <br/><br/><br/>
         </section>
        </section>
      </section>

      
      <!-- <img src="./images/" alt="img" class="claymorphic" style="position: fixed; top: 36vh; left: 75%; height: 25rem; opacity: 20%"> -->
   </body>


<!-- styles for calculator starts here -->
<style type="text/css">
.calculator {
    position: fixed;
    top: 28vh;
    left: 52%;
    width: 18rem;
    background-color: #f8f6f6;
    border-radius: 10px;
    overflow-x: hidden;
    padding: 20px;
    cursor: pointer;
    z-index: 9999;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    transform: scale(1);
    transition: 0.3s ease;
  }

 @media all and (orientation: landscape) and (max-width: 1200px){
  .calculator {
    height: 73% !important;
    top: 25vh;
  }
 }

  .calculator .display {
    width: 99%;
    padding: 10px;
    background: rgb(244, 244, 245);
    box-shadow: 0px 0px 9px rgb(190, 188, 188);
    margin-right: 3rem;
    margin-bottom: 30px;
    font-family: Arial, sans-serif;
    border-radius: 5px;
    text-align: right;
    font-size: 24px;
    border: none;
    outline: none;
  }

  .calculator .buttons {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 10px;
  }

  .calculator button {
    padding: 15px;
    font-family: Arial, sans-serif;
    font-size: 20px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: 0.3s ease;
  }

  .calculator button:hover {
    background-color: #0056b3;
  }

  /* styles for clear button */
  .calculator button.clear {
    grid-column: span 4;
    background-color: #dc3545;
  }
 </style>
 <!-- styles for calculator starts here -->
<script>
  
//## Function to handle form submission after delay starts here
let submitTimeout;
document.getElementById('bar_code').addEventListener('input', function() {
   clearTimeout(submitTimeout); //## Clear previous timeout if exists
   submitTimeout = setTimeout(submitForm, 1000); //## Set new timeout for 1 second
});

//## Function to submit form
function submitForm() {
   //## Check if both fields have values
   const Barcode = document.getElementById('bar_code').value.trim();
   const quantity =  1;
   
   if (Barcode !== '' && quantity !=='') {
       document.getElementById('barcode_form').submit();
   }

}
//## Function to handle form submission after delay ends here



//## code to add cashier logout btn starts here
let cashier_name = document.querySelector('div.cashier_name');
let logout_btn = document.querySelector('a.cashier_logout');

//## display btn when hovered on
cashier_name.addEventListener('mouseover', (e)=>{
 e.preventDefault();
 
 //## add logout_btn classList
 logout_btn.classList.add('active');
});


//## remove btn when mouse leaves element
cashier_name.addEventListener('mouseleave', (e)=>{
   e.preventDefault();
   
   //## remove logout_btn classList after 3min
   setTimeout(() => {
      logout_btn.classList.remove('active');
   }, 3000);
  });

//## code to add cashier logout btn ends here


//## cashier's calculator starts here
function appendNumber(num) {
   document.getElementById('display').value += num;
 }

 function appendOperator(op) {
   let display = document.getElementById('display').value;
   let lastChar = display[display.length - 1];
   if (!isNaN(lastChar) || lastChar === '.') {
     document.getElementById('display').value += op;
   }
 }

 function calculate() {
   let displayValue = document.getElementById('display').value;
   if (displayValue.trim() !== '') {
     let result = eval(displayValue);
     document.getElementById('display').value = result;
   }
 }

 function clearDisplay() {
   document.getElementById('display').value = '';
 }
 //## cashier's calculator ends here
</script>
</html>


<?php
  ## code to get product from the database base on the barcode inputed
  ## check if value is posted, also check the request method
  if (isset($_POST['bar_code'])  && $_SERVER["REQUEST_METHOD"] === "POST") {
   $bar_code = $conn->real_escape_string($_POST['bar_code']);
   $quantity = 1; ## Ensure quantity is an integer

   $sql = "SELECT * FROM products WHERE bar_code = '$bar_code' LIMIT 1";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       $product_id = $row['id'];
       $product_name = $row['product_name'];
       $product_price = $row['sales_price'];
       $product_profit = $row['sale_percent'];
      /////
       if (isset($_SESSION['cart'][$product_id])) { 
           $_SESSION['cart'][$product_id]['quantity'] += $quantity;
           $_SESSION['cart'][$product_id]['price'] = $product_price;
           $_SESSION['cart'][$product_id]['profit'] = $product_profit;

       } else {
           $_SESSION['cart'][$product_id] = array(
               'name' => $product_name,
               'price' => $product_price,
               'quantity' => $quantity,
               'profit' => $product_profit,
           );
       }
       ## Recalculate total
       $total = 0; 
       foreach ($_SESSION['cart'] as $product) {
           $total += $product['price'] * $product['quantity'];
           $total_profit+= $product['profit'] * $product['quantity'];
       } 
       echo'
       <script>window.location = "./cart.php"</script>
       ';
       exit();
   } else {
       echo '<script>alert("خطاء في الباركود !");</script>';
   }
}

?>