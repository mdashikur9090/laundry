
<?php 

 if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

  include_once '../inc/db_config.php';


  if (empty($_POST['exps_date']) || empty($_POST['exps_type']) || empty($_POST['pay_to']) || empty($_POST['amount'])) {
    header('Location: ../expence_type.php');
    ///echo "string";
  }else{
   # code...
    $exps_date = $_POST['exps_date'];
    $exps_type = $_POST['exps_type'];
    $pay_to = $_POST['pay_to'];
    $amount = $_POST['amount'];

    if ($_SESSION["user_role"]=0) {
      $exp_paidby = "Admin";
    }else{
      $exp_paidby = "Employee";
    }


    $sql_query="INSERT INTO `expenses`(`exps_date`, `exp_type`, `pay_to`, `exp_amt`, `exp_paidby`) VALUES ('".$exps_date."', '".$exps_type."', '".$pay_to."', ".$amount.", '".$exp_paidby."');";
    //echo $sql_query;
    DB_Query($sql_query);
    header('Location: ../expences.php');

  }

?>