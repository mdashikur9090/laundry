
<?php  
  include_once '../inc/db_config.php';


  if (empty($_POST['expence_id']) || empty($_POST['exps_type']) || empty($_POST['exps_code'])) {
    header('Location: ../expence_type.php');
    ///echo "string";
  }else{
   # code...
    $exps_id = $_POST['expence_id'];
    $exps_type = $_POST['exps_type'];
    $exps_code = $_POST['exps_code'];


    $sql_query="UPDATE `expense_type` SET `exps_type`='".$exps_type."', `exps_code`='".$exps_code."' WHERE exps_id=".$exps_id.";";
    //echo $sql_query;
    DB_Query($sql_query);
    header('Location: ../expence_type.php');

  }

?>