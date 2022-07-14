<?php 

	include_once './Asset/dbconnection.php';

	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		$uname = $_POST['username'];
		$pw =$_POST['password'] ;
        
		if (empty($uname)) {
			header("Location: ./index.php?error=Username is required");
		}elseif (empty($pw)){
			header("Location: ./index.php?error=Password is required");
		}else {
			$stmt="SELECT username, `password` FROM user_account WHERE username='$uname'";
			$query=$conn->query($stmt);
			if($row=$query->fetch()){
                echo $pw;
				if(password_verify($pw,$row['password'])){
                   
					header("Location: ./home.php");
					exit;
				}else {
					header("Location: ./index.php?error=Incorrect password!");
				}
			}
			else {
				header("Location: ./index.php?error=Incorrect Username or Password!");
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "./Asset/boostrap.php" ;
            ?>
    <?php require_once "./Asset/font.php" ?>
    <title>Login</title>
    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
            border-top-left-radius: .3rem;
            border-bottom-left-radius: .3rem;
        }
        .btn{
            width: 100%;
            
            font-size: 16px;
            border: none;
        }
        .btn:hover{
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
            transform: scale(1.02);
        }
    </style>
</head>
<body class="vh-90" style="background-color: #eee;">
    <section >
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row">
                            <!-- @left -->
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Welcome to E-Libray Project</h4>
                                    <p></p>
                                </div>
                            </div>

                            <!-- @right -->
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="./img/big_bbu_logo.png" style="width: 100px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">We are The D202 Team</h4>
                                    </div>
                                    <div>
                                        <?php if (isset($_GET['error'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                        <?=htmlspecialchars($_GET['error'])?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <!-- @form -->
                                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                        <div class="row">
                                            <p>Please login to your account</p>

                                            <div class="col-12">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" 
                                                    value=""
                                                    id="username" class="form-control mb-4" placeholder="Enter your username">
                                            </div>
                                            <br>

                                            <div class="col-12">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password" class="form-control mb-4" placeholder="Enter your password">
                                            </div>

                                            <div class="text-center pt-1 mb-5 pb-1">
                                                <button class="btn btn-primary btn-block gradient-custom-2 mb-3" type="submit">LOGIN</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

