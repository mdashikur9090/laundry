
<?php  
  include_once '../inc/db_config.php';



  if (empty($_POST['exps_type']) || empty($_POST['exps_code'])) {
    header('Location: ../expence_type.php');
   //	echo "string";
  }else{
   # code...
    $exps_type = $_POST['exps_type'];
    $exps_code = $_POST['exps_code'];

    $sql_query="INSERT INTO `expense_type`(`exps_type`, `exps_code`) VALUES ('".$exps_type."','".$exps_code."');";

    //echo $sql_query;
    DB_Query($sql_query);
    header('Location: ../expence_type.php');

  }

?>