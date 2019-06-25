
<?php  
  include_once '../inc/db_config.php';
  include_once '../mailSender.php';

  if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }



  if (empty($_POST['invoice_num']) || empty($_POST['order_date']) || empty($_POST['service_id']) || empty($_POST['cloth_id']) || empty($_POST['qty'])|| empty($_POST['dis']) || empty($_POST['total_vat']) || empty($_POST['grand_total']) || empty($_POST['expect_d_date'])) {
    header('Location: ../order.php');
   	//echo "string";
  }else{
   # code...
    $invoice_num = $_POST['invoice_num'];
    $order_date = $_POST['order_date'];
    $user_id = $_SESSION["user_id"];
    $discount = $_POST['dis'];
    $service_id = $_POST['service_id'];
    $cloth_id = $_POST['cloth_id'];
    $qty = $_POST['qty'];
    $total_vat = $_POST['total_vat'];
    $grand_total = $_POST['grand_total'];
    $expect_d_date = $_POST['expect_d_date'];
    $order_status = "Pending";

    $sum_discount = 0;
    $sum_total_vat = 0;
    $sum_grand_total = 0;


    for ($a=0; $a <count($_POST['service_id']) ; $a++) { 
      $sum_discount += $discount[$a];
      $sum_total_vat += $total_vat[$a];
      $sum_grand_total += $grand_total[$a];

    }


    $orderSQL="INSERT INTO `orders`(`invoice_no`, `order_date`, `customer_id`, `discount`, `total_vat`, `grand_total`, `delivery_date`, `order_status`) VALUES ('".$invoice_num."','".$order_date."', ".$user_id.", ".$sum_discount.", ".$sum_total_vat.", ".$sum_grand_total.", '".$expect_d_date."', '".$order_status."');";

    DB_Query($orderSQL);


    for ($i=0; $i <count($_POST['service_id']) ; $i++) { 
      # code...

      $orderItemSQL="INSERT INTO `orders_items`(`invoice_no`, `service_id`, `cloth_type`, `qty`) VALUES ('".$invoice_num."', ".$service_id[$i].", ".$cloth_id[$i].", ".$qty[$i].");";

      //echo $orderSQL."    ".$orderItemSQL;
      //exit();

      
      DB_Query($orderItemSQL);

        if ($_SESSION["user_role"] ==2) {
          # code...
          sendMail($_SESSION["user_email"],"Laundry System","Booking Confirmaion","Your Order has been successfully completed.");
        }

      

    }




    

    header('Location: ../order_list.php');

  }

?>