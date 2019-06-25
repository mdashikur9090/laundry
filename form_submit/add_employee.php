
<?php  
  include_once '../inc/db_config.php';



  if (empty($_POST['join_date']) || empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['gender']) || empty($_POST['birth_date']) || empty($_POST['address']) || empty($_POST['mobile']) || empty($_POST['email_id']) || empty($_POST['password']) || empty($_POST['salary'])) {
    header('Location: ../employee.php');
   	//echo "string";
  }else{
   # code...
    $join_date  = $_POST['join_date'];
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $gender     = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $address    = $_POST['address'];
    $mobile     = $_POST['mobile'];
    $email      = $_POST['email_id'];
    $passwords  = $_POST['password'];
    $status     = "enable";
    $leave_date = "";
    $salary     = $_POST['salary'];

    $sql_query="INSERT INTO `employee`(`join_date`, `first_name`, `last_name`, `mobile`, `email_id` 
    , `address`, `birth_date`, `gender`, `status`, `password`, `leave_date`, `salary`)
     VALUES ('".$join_date."','".$first_name."','".$last_name."','".$mobile."','".$email."','".
    $address."','".$birth_date."','".$gender."','".$status."','".$passwords."','".$leave_date."', ".$salary.");";
    //echo $sql_query;

    DB_Query($sql_query);
    header('Location: ../employee.php');

  }

?>