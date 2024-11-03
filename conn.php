<?php

$HOST = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DB = "pos";

$er_conn = new mysqli("$HOST","$USERNAME","$PASSWORD");

if(mysqli_select_db($er_conn,$DB)){
   $conn = new mysqli("$HOST","$USERNAME","$PASSWORD","$DB");
}
else{
    $er_conn->query('CREATE Database `pos`');
    $conn = new mysqli("$HOST","$USERNAME","$PASSWORD","$DB");
    mysqli_multi_query($conn,"CREATE TABLE IF NOT EXISTS `admin_config` (
       `id` int NOT NULL AUTO_INCREMENT,
        `admin_name` varchar(255) NOT NULL,
        `admin_password` varchar(255) NOT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Admin login configurations';
      
      --
      -- إرجاع أو استيراد بيانات الجدول `admin_config`
      --
      
      INSERT INTO `admin_config` (`id`, `admin_name`, `admin_password`) VALUES
      (1, 'admin', '$2y$10\$j3B6oMBxlNIfaFkZDQHxfO/Pr7Ml7CaydhoL3g9LAOtW93XtkwsS2');
      
      -- --------------------------------------------------------
      
      --
      -- بنية الجدول `cashier_infor`
      --
      
      CREATE TABLE IF NOT EXISTS `cashier_infor` (
        `id` int NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `gender` varchar(10) NOT NULL,
        `cashier_id` varchar(100) NOT NULL,
        `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='cashier''s information';
      
      --
      -- إرجاع أو استيراد بيانات الجدول `cashier_infor`
      --
      
      -- --------------------------------------------------------
      
      --
      -- بنية الجدول `distributors`
      --
      
      CREATE TABLE IF NOT EXISTS `distributors` (
        `id` int NOT NULL AUTO_INCREMENT,
        `distributor_name` varchar(100) NOT NULL,
        `reg_no` varchar(50) NOT NULL,
        `address` varchar(255) NOT NULL,
        `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='distributors ';
      
      -- --------------------------------------------------------
      
      --
      -- بنية الجدول `expiry_config`
      --
      
      CREATE TABLE IF NOT EXISTS `expiry_config` (
        `id` int NOT NULL AUTO_INCREMENT,
        `expiry_range` varchar(100) NOT NULL,
        `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='time specified for product         to rech expiry';
      
      -- --------------------------------------------------------
      
      --
      -- بنية الجدول `notifications`
      --
      
      CREATE TABLE IF NOT EXISTS `notifications` (
        `id` int NOT NULL AUTO_INCREMENT,
        `product_name` varchar(100) NOT NULL,
        `notification_on` varchar(100) NOT NULL,
        `message` varchar(100) NOT NULL,
        `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='product detail       notificatioon';
      
      -- --------------------------------------------------------
      
      --
      -- بنية الجدول `products`
      --
      
      CREATE TABLE IF NOT EXISTS `products` (
        `id` bigint NOT NULL AUTO_INCREMENT,
        `product_name` varchar(100) NOT NULL,
        `sales_price` bigint NOT NULL,
        `sale_percent` int NOT NULL,
        `purchace_price` bigint NOT NULL,
        `bar_code` varchar(255) NOT NULL,
        `tax` int NOT NULL,
        `quantity` int NOT NULL,
        `expiry_year` year NOT NULL,
        `expiry_month` int NOT NULL,
        `expiry_day` int NOT NULL,
        `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='products added to the       system';
      
      --
      -- إرجاع أو استيراد بيانات الجدول `products`
      --
      
      
      -- --------------------------------------------------------
      
      --
      -- بنية الجدول `quantity_config`
      --
      
      CREATE TABLE IF NOT EXISTS `quantity_config` (
        `id` int NOT NULL AUTO_INCREMENT,
        `quantity` int NOT NULL,
        `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='product quantity to alert       for restocking';
      
      --
      -- إرجاع أو استيراد بيانات الجدول `quantity_config`
      --
      
      
      -- --------------------------------------------------------
      
      --
      -- بنية الجدول `sales`
      --
      
      CREATE TABLE IF NOT EXISTS `sales` (
        `id` int NOT NULL AUTO_INCREMENT,
        `product_infor` varchar(9000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
        `total_naira` bigint NOT NULL,
        `trans_id` bigint NOT NULL,
        `total_profit` int NOT NULL,
        `change_element` bigint NOT NULL,
        `change_reminant` int NOT NULL,
        `payment_mode` varchar(50) NOT NULL,
        `ip_address` varchar(255) NOT NULL,
        `cashier` varchar(100) NOT NULL,
        `year` year NOT NULL,
        `month` varchar(50) NOT NULL,
        `day` varchar(50) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `id` (`id`),
        UNIQUE KEY `id_2` (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='all sales made';
      
      --
      -- إرجاع أو استيراد بيانات الجدول `sales`
      --
      
      I
      
      -- --------------------------------------------------------
      
      --
      -- بنية الجدول `udo_list`
      --
      
      CREATE TABLE IF NOT EXISTS `udo_list` (
        `id` int NOT NULL AUTO_INCREMENT,
        `product_id` bigint NOT NULL,
        `quantity` bigint NOT NULL,
        `action` varchar(50) NOT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='UDO list | unsold,destroyed        or other |';
      
      --
      -- إرجاع أو استيراد بيانات الجدول `udo_list`
      --
      
      COMMIT;");
      
 

}


## if error in connection
// if (!$conn) {
   # code...
   //  die ("CONNECTION ERROR:" .$conn->connect_error);
// }




?>