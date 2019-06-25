
<?php  
  include_once '../inc/db_config.php';


  if (empty($_POST['first_name']) || empty($_POST['last_name'])|| empty($_POST['address'])|| empty($_POST['mobile'])|| empty($_POST['email'])|| empty($_POST['passwords'])) {
    header('Location: ../register.php');
   	//echo "string";
  }else{
   # code...
    $join_date  = "01/01/2018";
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $address    = $_POST['address'];
    $mobile     = $_POST['mobile'];
    $email      = $_POST['email'];
    $passwords  = $_POST['passwords'];
    $status     = "enable";
    $last_login = "";

    $sql_query="INSERT INTO `customers`(`join_date`, `first_name`, `last_name`, `address`, `email_id`, `mobile`, `status`, `password`) VALUES ('".$join_date."','".$first_name."','".$last_name."','".$address."','".$email."','".$mobile."','".$status."','".$passwords."');";
    //echo $sql_query;

    DB_Query($sql_query);
    header('Location: ../login.php');

  }

?>