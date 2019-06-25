
<?php  
  include_once '../inc/db_config.php';



  if (empty($_POST['id']) || empty($_POST['table_name'])) {
    header('Location: ../index.php');
   	//echo "string";
  }else{
   # code...
    $item_id = $_POST['id'];
    $table_name = $_POST['table_name'];


    if ($table_name=="cloths") {
      # code...
      $sql_query = "DELETE FROM `cloths` WHERE `id`=".$item_id.";";
      DB_Query($sql_query);
      header('Location: ../cloths.php');
      exit();
    }elseif ($table_name=="services") {
      # code...
      $sql_query = "DELETE FROM `services` WHERE `id`=".$item_id.";";
      DB_Query($sql_query);
      header('Location: ../laundry_service.php');
      exit();
    }elseif ($table_name=="pricing") {
      # code...
      $sql_query = "DELETE FROM `pricing` WHERE `id`=".$item_id.";";
      DB_Query($sql_query);
      header('Location: ../pricing.php');
      exit();
    }elseif ($table_name=="customers") {
      # code...
      $sql_query = "DELETE FROM `customers` WHERE `id`=".$item_id.";";
      DB_Query($sql_query);
      header('Location: ../customer.php');
      exit();
    }elseif ($table_name=="employee") {
      # code...
      $sql_query = "DELETE FROM `employee` WHERE `emp_id`=".$item_id.";";
      DB_Query($sql_query);
      header('Location: ../employee.php');
      exit();
    }elseif ($table_name=="expense_type") {
      # code...
      $sql_query = "DELETE FROM `expense_type` WHERE `exps_id`=".$item_id.";";
      DB_Query($sql_query);
      header('Location: ../expence_type.php');
      exit();
    }elseif ($table_name=="expenses") {
      # code...
      $sql_query = "DELETE FROM `expenses` WHERE `exp_id`=".$item_id.";";
      DB_Query($sql_query);
      header('Location: ../expenses.php');
      exit();
    }elseif ($table_name=="orders") {
      # code...
      $sql_query = "DELETE FROM `orders` WHERE `invoice_no`='".$item_id."';";
      DB_Query($sql_query);
      $sql_query = "DELETE FROM `orders_items` WHERE `invoice_no`='".$item_id."';";
      DB_Query($sql_query);
      header('Location: ../order_list.php');
      exit();
    }

  }


?>

    