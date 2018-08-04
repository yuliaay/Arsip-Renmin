
<?php 
function cek_data($nama,$pass){
	
	$query = "SELECT * FROM users WHERE username='$nama' AND password='$pass'";

	global $link;

	if($result= mysqli_query($link, $query)){
		if(mysqli_num_rows($result) !=0) return true;
		else return false;
	}
}

function getUserLevel($username) {
	global $link;
	$query = "SELECT status FROM users WHERE username = '$username'";

	if ($result = $link->query($query)) {
		if($result->num_rows > 0) {
			$obj = $result->fetch_object();
			return $obj->status;
		}
	}
	
}

?>
