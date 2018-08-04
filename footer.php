<?php
require_once "core/init.php";
if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}
?>

	<div class="row">
          <footer id="admin-footer" class="clearfix">
            <div class="pull-left"><p> Copyright 2018 </p></div>
            <div class="pull-right"><p> Sistem Informasi </p></div>
          </footer>
      </div>