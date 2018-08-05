<?php
require_once "core/init.php";
if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}


?>
<style type="text/css">
  
/* Style The Dropdown Button */
.dropbtn {
    background-color: white;
    color: grey;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
    margin-right:  19%;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 190px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.1);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 10px 16px;
    text-decoration: none;
    display: block;
    font-size: 11px;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;

}

.label .label-warning {
  margin-left: -2%;
}

#logout {
  list-style-type: none;
  margin-top: -3%;
  margin-right:  4%;

}

.navhead {
  margin-left: 20%;
}



</style>

        <div class="col-md-10 col-sm-11 display-table-cell  valign-top">
          <div class="row">
           

            <header id="nav-header" class="clearfix">
              <div class="col-md-5">
                <nav class="navbar-default pull-right">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu">
                  <span class="sr-only"></span>
                  <span class="icon-bar"> </span>
                  <span class="icon-bar"> </span>
                  <span class="icon-bar"> </span>
                </button>
                </nav>

                <input type="text" name="cari" class="hidden-sn hidden-xs" id="header-search-field" placeholder="Search for Something..">
              </div>
              <?php if(isset($_GET['notf'])){
                $n_id = $_GET['notf'];
                $pdo->query("update notifications set read_n='0' where id='$n_id'");
              } ?>

              <div class="col-md-7">
                <ul>       
                  <div class="dropdown pull-right">
                  <li class="fixed-width"> 
                   <button class="dropbtn "><span class="glyphicon glyphicon-bell" id="notif"></span></button>
                         <span class="label label-success">  <?php echo "$count"; ?></span>
                          <div class="dropdown-content">
                            <?php  
                            foreach ($data as $value) {
                              # code...
                          ?>
                            <?php if($value['read_n'] == '1'){ 
                              $id = $value['id'];
                              ?>
                            <a href="?notf=<?php echo $value['id']; ?>" class="alert-danger"> Anda Menerima 1 <?php echo $value['title']; ?> Baru </a>
                          <?php } }?> 
                      </div>
                  </li>
                </div>
               </ul>
             </div>

                  <li id="logout" class="pull-right"> 
                    <a href="logout.php" class="logout">
                        <span class="glyphicon glyphicon-log-out"><span>
                        Logout
                    </a>
                  </li>

            </header>
        </div>
