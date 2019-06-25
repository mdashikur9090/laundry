
<?php  
  include_once '../inc/db_config.php';


  if (empty($_POST['exp_id']) || empty($_POST['exps_date']) || empty($_POST['exp_type_id']) || empty($_POST['pay_to']) || empty($_POST['exp_amt']) || empty($_POST['exp_paidby'])) {
    header('Location: ../expences.php');
  }else{
   # code...
    $exp_id = $_POST['exp_id'];
    $exps_date = $_POST['exps_date'];
    $exp_type_id = $_POST['exp_type_id'];
    $pay_to = $_POST['pay_to'];
    $exp_amt = $_POST['exp_amt'];
    $exp_paidby = $_POST['exp_paidby'];


    $sql_query="UPDATE `expenses` SET `exps_date`='".$exps_date."', `exp_type`=".$exp_type_id.", `pay_to`='".$pay_to."', `exp_amt`=".$exp_amt.", `exp_paidby`='".$exp_paidby."' WHERE exp_id=".$exp_id.";";

    DB_Query($sql_query);
    header('Location: ../expences.php');

  }

?>