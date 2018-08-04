
<?php 

$pdo = new PDO("mysql:host=localhost;dbname=arsip_renmin", 'root', '');

  if(isset($_GET['notf'])){
    $n_id = $_GET['notf'];
    $pdo->query("update notifications set read_n='0' where id='$n_id'");
  }

  $data = $pdo->query("select * from notifications"); 

  $new_data = $pdo->query("select * from notifications where read_n=1");

  $count = $new_data->rowCount();

?>