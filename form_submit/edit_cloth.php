
<?php  
  include_once '../inc/db_config.php';



  if (empty($_POST['cloth_id']) || empty($_POST['cloth_name']) || empty($_POST['cloth_code'])) {
    header('Location: ../cloths.php');
  }else{
   # code...
    $cloth_id = $_POST['cloth_id'];
    $cloth_name = $_POST['cloth_name'];
    $cloth_code = $_POST['cloth_code'];


    $sql_query="UPDATE `cloths` SET `cloth_type`='".$cloth_name."', `cloth_code`='".$cloth_code."' WHERE id=".$cloth_id.";";

    DB_Query($sql_query);
    header('Location: ../cloths.php');

  }

?>