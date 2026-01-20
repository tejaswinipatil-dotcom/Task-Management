<?php session_start(); include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
 $u=$_POST['email']; $p=$_POST['password'];
 $stmt=$conn->prepare("SELECT id,password FROM users WHERE email=?");
 $stmt->bind_param("s",$u); $stmt->execute(); $stmt->store_result();
 if($stmt->num_rows>0){
  $stmt->bind_result($id,$hash); $stmt->fetch();
  if(password_verify($p,$hash)){ $_SESSION['uid']=$id; header('Location: dashboard.php'); exit;}
 }
 $err="Invalid login";
}
?>
<form method='POST'>
<input name='email'><input name='password' type='password'>
<button>Login</button>
<?php if(isset($err)) echo $err; ?>
</form>
<a href='register.php'>Register</a>