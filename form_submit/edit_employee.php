
<?php  
  include_once '../inc/db_config.php';


  if (empty($_POST['emp_id']) || empty($_POST['join_date']) || empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['gender']) || empty($_POST['address']) || empty($_POST['email_id']) || empty($_POST['mobile']) || empty($_POST['password']) || empty($_POST['status']) || empty($_POST['salary'])) {
    header('Location: ../employee.php');
    //echo "string";
  }else{
   # code...
    $emp_id = $_POST['emp_id'];
    $join_date = $_POST['join_date'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $email_id = $_POST['email_id'];
    $leave_date = $_POST['leave_date'];
    $salary = $_POST['salary'];


    $sql_query="UPDATE `employee` SET `join_date`='".$join_date."', `first_name`='".$first_name."', `last_name`='".$last_name."', `mobile`='".$mobile."', `email_id`='".$email_id."', `address`='".$address."', `gender`='".$gender."', `status`='".$status."', `password`='".$password."', `leave_date`='".$leave_date."', `salary`=".$salary." WHERE emp_id=".$emp_id.";";
    //echo $sql_query;
    DB_Query($sql_query);
    //echo $sql_query;
    //exit();
    header('Location: ../employee.php');

  }

?>