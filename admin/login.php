<?php
include '../lib/Session.php';
Session::init();

 ?>
<?php include '../config/config.php';  ?>
<?php include '../lib/Database.php';  ?>
<?php include '../helpers/format.php';  ?>
<?php
$db= new Database();
$fm=new format();

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
    <?php if ($_SERVER['REQUEST_METHOD']=='POST')
      {
       $username = $fm->Validation($_POST['username']) ;
       $password = $fm->Validation(md5($_POST['password']));

       $username = mysql_real_escape_string( $username);
       $password = mysql_real_escape_string( $password);

       $query = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password' ";
       $result = $db->select($query);
       if ( $result != false ) {
         $value = mysqli_fetch_array($result);
         $rows = mysqli_num_rows($result);
         if ($rows > 0) {
           Session::set("login",true);
           Session::set("username",$value['username']);
           Session::set("userId",$value['id']);
           header("Location:index.php");
         }else {
           echo "Sorry No result found...";
         }
       }else {
         echo "Sorry Username and Password not matched....";
       }

      }

     ?>


		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
