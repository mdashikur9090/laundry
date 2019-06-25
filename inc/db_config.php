<?php  
  ini_set('display_errors', 'on');

  define('DB_SERVER', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_TBL', 'laundry');

  function DB_Query($sql) {
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_TBL);

    $resault = mysqli_query($conn, $sql);

    mysqli_close($conn);

    return $resault;
  }

?>