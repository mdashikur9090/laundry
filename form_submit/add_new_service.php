
<?php  
  include_once '../inc/db_config.php';



  if (empty($_POST['service_name']) || empty($_POST['service_code'])) {
    header('Location: ../laundry_service.php');
   	//echo "string";
  }else{
   # code...
    $service_name = $_POST['service_name'];
    $service_code = $_POST['service_code'];

    $sql_query="INSERT INTO `services`(`service_name`, `service_code`) VALUES ('".$service_name."','".$service_code."');";
    //echo $sql_query;

    DB_Query($sql_query);
    header('Location: ../laundry_service.php');

  }

?>