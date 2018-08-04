
<?php 
require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

require_once 'sidemenu.php'; 


require_once 'footer.php'; ?>