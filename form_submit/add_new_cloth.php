
<?php  
  include_once '../inc/db_config.php';



  if (empty($_POST['cloth_name']) || empty($_POST['cloth_code'])) {
    header('Location: ../cloths.php');
   	echo "string";
  }else{
   # code...
    $cloth_name = $_POST['cloth_name'];
    $cloth_code = $_POST['cloth_code'];

    $sql_query="INSERT INTO `cloths`(`cloth_type`, `cloth_code`) VALUES ('".$cloth_name."','".$cloth_code."');";

    DB_Query($sql_query);
    header('Location: ../cloths.php');

  }

?>