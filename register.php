<?php session_start(); include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
 $u=$_POST['email']; $p=password_hash($_POST['password'],PASSWORD_BCRYPT);
 $stmt=$conn->prepare("INSERT INTO users(email,password) VALUES(?,?)");
 $stmt->bind_param("ss",$u,$p); $stmt->execute();
 header('Location:index.php'); exit;
}
?><form method='POST'>
<input name='email'><input name='password' type='password'>
<button>Register</button>
</form>