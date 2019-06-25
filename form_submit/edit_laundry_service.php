
<?php  
  include_once '../inc/db_config.php';


  if (empty($_POST['service_id']) || empty($_POST['service_name']) || empty($_POST['service_code'])) {
    header('Location: ../laundry_service.php');
  }else{
   # code...
    $service_id = $_POST['service_id'];
    $service_name = $_POST['service_name'];
    $service_code = $_POST['service_code'];


    $sql_query="UPDATE `services` SET `service_name`='".$service_name."', `service_code`='".$service_code."' WHERE id=".$service_id.";";

    DB_Query($sql_query);
    header('Location: ../laundry_service.php');

  }

?>