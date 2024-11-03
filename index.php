<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/style.css" rel="stylesheet">
      <!-- title -->
      <title>النظام الاكتروني لمتجر الزهراء</title>
      <!-- fav icon -->
      <link rel="shortcut icon" href="./images/shop_logo.png" type="image/x-icon">

      <!-- external styling -->
      <link rel="stylesheet" href="./styles/dist/cart.css">
      <link href="./styles/dist/admin_index.css" rel="stylesheet">
   </head>
<body>

<section class="main-content">
    <!-- page header section starts here -->
    <header class="page-header">
      <div class="img-wrapper">
         <a href="#">
            <img src="./images/shop_logo.png" alt="logo">
         </a>
      </div>
    </header> <br/>
     <!-- page header section ends here -->

     <section class="activity">
      <a href="./iamadmin/">
         <span class="admin">
            <i class="fas fa-user"></i>&nbsp;
            <h1><b>الاداره</b></h1>
         </span>
      </a>

      <a href="./cashier_login/cashier_login.php">
         <span class="cashier">
            <i class="fas fa-sack-dollar"></i>&nbsp;
            <h1>محاسب</h1>
         </span>
      </a>
     </section>
	 
	    <br/><br/><br/>
         <footer class="footer">
         osman  <span>&copy;<?= Date('Y') ?></span>
         </footer>
</section>


<noscript>Pls you need to enable javascript in your browser!</noscript>
</body>

<!-- Internal styles -->
<style type="text/css">
   *{
      transition: none;
   }
   section.main-content{
	   overflow: visible !important;
   }
   section.activity{
    position: relative;
    margin-top: 18rem;
    padding: 0 2rem;
    width: 100%;
    justify-content: center;
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
   }
   span:is(.admin,.cashier){
      color: #eaeaea;
   }
   section.activity a{
      background: linear-gradient(50deg, #e76022, #e74022);
      height: auto;
      position: relative;
      padding: 3rem 8rem;
      box-shadow: 1px 1px 8px rgb(63, 62, 62);
      border-radius: .3rem;
      text-align: center;
      justify-content: center;
      align-items: center;
   }
   section.activity a:hover{
      background: linear-gradient(80deg, #dd5f24, #e64124);
   }
   section.activity a:hover span:is(.admin,.cashier){
      bottom: 6px;
      position: relative;
	  transition: ease-in 9s !important;
   }
   footer.footer{
	   padding-top: 12px;
	   border-top: 1px dashed #eee;
	   text-align: center;
	   position: absolute;
	   top: auto;
	   transform: translate(55%,26vh);
	   color: #e74022;
	   font-size: 14px;
	   
	   span{
		   font-size: 12px;
	   }
   }
</style>
</html>