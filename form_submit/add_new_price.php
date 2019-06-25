
<?php  
  include_once '../inc/db_config.php';



  if (empty($_POST['short_code']) || empty($_POST['service_name']) || empty($_POST['cloth_type']) || empty($_POST['price']) ) {
    header('Location: ../pricing.php');
   	//echo "string";
  }else{
   # code...
    $short_code = $_POST['short_code'];
    $service_id = $_POST['service_name'];
    $cloth_id = $_POST['cloth_type'];
    $vat = $_POST['vat'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];


  $chekcAlreadyInserSQL="SELECT COUNT(`id`) AS foundRow FROM `pricing` WHERE `service_id`=".$service_id." AND `cloth_id`=".$cloth_id.";";

  $chekcAlreadyInserSQLResult = DB_Query($chekcAlreadyInserSQL);

  echo $chekcAlreadyInserSQL;
  while ($countRow = mysqli_fetch_assoc($chekcAlreadyInserSQLResult)) {
                  extract($countRow);
    }

    if ($foundRow == 0) {
      # code...
      $sql_query="INSERT INTO `pricing`(`short_code`, `service_id`, `cloth_id`, `vat`, `price`, `discount`) VALUES ('".$short_code."', ".$service_id.", ".$cloth_id.", ".$vat.", ".$price.", ".$discount.");";
      //echo $sql_query;
      DB_Query($sql_query);
    }


    header('Location: ../pricing.php');

  }

?>