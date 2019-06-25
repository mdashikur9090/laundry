
<?php  
  include_once '../inc/db_config.php';
  include_once '../mailSender.php';


  if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    if ($_SESSION["user_role"]==0 || $_SESSION["user_role"]==1) {
      # code...

      if (empty($_POST['invoice_no']) || empty($_POST['delivery_date']) ||  empty($_POST['order_status'])) {
          header('Location: ../order_list.php');
      }else{
           # code...
            $invoice_no = $_POST['invoice_no'];
            $delivery_date = $_POST['delivery_date'];
            $order_status = $_POST['order_status'];
            $customerEmail = "";


            $sqlEmail="SELECT orders.customer_id, customers.email_id FROM `orders`INNER JOIN customers ON (orders.customer_id=customers.id)  WHERE `invoice_no`='".$invoice_no."';";

            $sqlEmailResult = DB_Query($sqlEmail);

            while ($sqlEmailResultRow = mysqli_fetch_assoc($sqlEmailResult)) {
                  extract($sqlEmailResultRow);
                  $customerEmail = $email_id;
                }


            $sql_query="UPDATE `orders` SET `delivery_date`='".$delivery_date."', `order_status`='".$order_status."' WHERE invoice_no='".$invoice_no."';";

            //echo $sql_query;
            //exit();

            DB_Query($sql_query);


            //now send mail
            sendMail($customerEmail,"Laundry System","Order Status","Your invoice no ".$invoice_no." product delivery date is ".$delivery_date);

            header('Location: ../order_list.php');

        }
      
        
    }else{
      header('Location: ../order_list.php');

    }



  

?>