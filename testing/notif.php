<?php include 'connect.php' ;?>
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../vendor/admin/css/default.css">


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
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 10px 13px;
    text-decoration: none;
    display: block;
    
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
	<title>notification</title>
</head>
<body>


        <div class="col-md-8 col-sm-11 display-table-cell  valign-top">
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

<?php 

	if(isset($_GET['notf'])){
		$n_id = $_GET['notf'];
		$pdo->query("update notifications set read_n='0' where id='$n_id'");
		header("location:notif.php");
	}

	$data = $pdo->query("select * from notifications"); 

	$new_data = $pdo->query("select * from notifications where read_n=1");

	$count = $new_data->rowCount();

?>

              <div class="col-md-7">
                <ul>       
                  <div class="dropdown pull-right">
                  <li class="fixed-width"> 
                   <button class="dropbtn "><span class="glyphicon glyphicon-bell" id="notif"> </span></button>
                   		<?php if($count > 0) { ?>
                         <span class="label label-success">
                         	<?php echo "$count"; ?>
                         	</span>
                          <div class="dropdown-content">
                         <?php } ?>
                          <?php 
                          	foreach ($data as $value) {
                          		# code...
                          ?>
                            
                            <?php if($value['read_n'] == '1'){ 
                            	$id = $value['id'];
                            	?>
                            	<a href="?notf=<?php echo $value['id']; ?>" class="alert-danger" class="comment"> <?php echo $value['title']; ?> <br>
                            	<p> testing </p> </a>

                           <?php } }?>
                       
                          </div>
                       </a>
                  </li>
                </div>
               </ul>
             </div>




</body>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../vendor/bootstrap-3.3.7-dist/js/jquery.js"></script>
    <script src="../vendor/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../vendor/admin/js/default.js"></script>

</html>