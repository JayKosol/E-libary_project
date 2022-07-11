<?php 
session_start();
include_once './../Asset/dbconnection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	$uname = $_POST['username'];
	$pw =$_POST['password'] ;

	if (empty($uname)) {
		header("Location: ./../index.php?error=Username is required");
	}else if (empty($pw)){
		header("Location: ./../index.php?error=Password is required&email=$uname");
	}else {
		$stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
		$stmt->execute([$uname]);

		if ($stmt->rowCount() == 1) {
			$user = $stmt->fetch();

			//$user_id = $user['userId'];
               //$user_Type=$user['userTypes'];
			$user_name = $user['username'];
			$user_password = $user['password'];
			//$user_position = $user['position'];
			//$user_create = $user['createDate'];
			//$user_desc = $user['description'];

			if ($uname == $user_name) {
				if (password_verify($pw, $user_password)) {
					//$_SESSION['userId'] = $user_id;
                         //$_SESSION['userTypes']=$user_Type;
					$_SESSION['username'] = $user_name;
					//$_SESSION['position'] = $user_position;
                         //$_SESSION['createDate']=$user_create;
                         //$_SESSION['description']=$user_desc;
					header("Location: ./../home.php");

				}else {
					header("Location: ./../index.php?error=Incorect User name or password&email=$uname");
				}
			}else {
				header("Location: ./../index.php?error=Incorect User name or password&email=$uname");
			}
		}else {
			header("Location: ./../index.php?error=Incorect User name or password&email=$uname");
		}
	}
}
