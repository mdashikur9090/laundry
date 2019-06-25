
<?php  
  include_once '../inc/db_config.php';


  if (empty($_POST['id']) || empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['address']) || empty($_POST['address']) || empty($_POST['mobile']) || empty($_POST['email_id']) || empty($_POST['password']) || empty($_POST['status'])) {
    header('Location: ../customer.php');
   	//echo "string";
  }else{
   # code...
    $id  = $_POST['id'];
    $join_date  = "01/01/2018";
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $address    = $_POST['address'];
    $mobile     = $_POST['mobile'];
    $email      = $_POST['email_id'];
    $passwords  = $_POST['password'];
    $status     = $_POST['status'];
    $last_login = "";

    $sql_query="UPDATE `customers` SET `join_date`='".$join_date."', `first_name`='".$first_name."', `last_name`='".$last_name."', `address`='".$address."', `email_id`='".$email."', `mobile`='".$mobile."', `status`='".$status."', `password`='".$passwords."' WHERE id=".$id.";";
    //echo $sql_query;

    DB_Query($sql_query);
    header('Location: ../customer.php');

  }

?>