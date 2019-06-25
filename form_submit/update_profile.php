
<?php  
  include_once '../inc/db_config.php';


  if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    if ($_SESSION["user_role"]==0) {
      # code...
      
        
    }elseif ($_SESSION["user_role"]==1) {
      # code...
    }else{
      if (empty($_POST['first_name']) || empty($_POST['last_name']) ||  empty($_POST['mobile']) || empty($_POST['address'])) {
          header('Location: ../cloths.php');
      }else{
           # code...
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];


            $sql_query="UPDATE `customers` SET `first_name`='".$first_name."', `last_name`='".$last_name."', `mobile`='".$mobile."', `address`='".$address."' WHERE id=".$_SESSION["user_id"].";";

            //echo $sql_query;
            //exit();

            DB_Query($sql_query);

            header('Location: ../profile.php');

        }

    }



  

?>