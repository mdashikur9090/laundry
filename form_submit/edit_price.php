
<?php  
  include_once '../inc/db_config.php';


  if (empty($_POST['price_id']) || empty($_POST['short_code']) || empty($_POST['service_name']) || empty($_POST['cloth_type']) ||  empty($_POST['pricing']) ) {
    header('Location: ../pricing.php');
   	//echo "string";
  }else{
   # code...
    $price_id = $_POST['price_id'];
    $short_code = $_POST['short_code'];
    $service_id = $_POST['service_name'];
    $cloth_id = $_POST['cloth_type'];
    $vat = $_POST['vat'];
    $price = $_POST['pricing'];
    $discount = $_POST['dis'];

    $sql_query="UPDATE `pricing` SET `short_code`='".$short_code."', `service_id`=".$service_id.", `cloth_id`=".$cloth_id.", `vat`=".$vat.", `price`=".$price.", `discount`=".$discount." WHERE id=".$price_id.";";
    //echo $sql_query;

    DB_Query($sql_query);
    header('Location: ../pricing.php');

  }

?>