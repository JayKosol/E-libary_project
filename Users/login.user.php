<?php 

	include_once './../Asset/dbconnection.php';

	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		$uname = $_POST['username'];
		$pw =$_POST['password'] ;

		if (empty($uname)) {
			header("Location: ./../index.php?error=Username is required");
		}else if (empty($pw)){
			header("Location: ./../index.php?error=Password is required");
		}else {
			$stmt="SELECT * FROM users WHERE username='$uname'";
			$query=$conn->query($stmt);

			if($row=$query->fetch()){
				if(password_verify($pw,$row['password'])){
					header("Location: ./../home.php");
					exit;
				}else {
					header("Location: ./../index.php?error=Incorect User name or password!");
				}
			}
			else {
				header("Location: ./../index.php?error=Incorect User name or password!");
			}
		}
	}
?>