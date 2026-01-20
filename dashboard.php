<?php session_start(); include 'db.php';
if(!isset($_SESSION['uid'])){ header('Location:index.php'); exit;}
$uid=$_SESSION['uid'];
$stmt=$conn->prepare("SELECT id,title FROM tasks WHERE user_id=?");
$stmt->bind_param("i",$uid); $stmt->execute();
$res=$stmt->get_result();
?>
<h2>Tasks</h2>
<form method='POST' action='task_add.php'>
<input name='title'>
<button>Add</button>
</form>
<ul>
<?php while($t=$res->fetch_assoc()): ?>
<li><?php echo $t['title']; ?>
<a href='task_delete.php?id=<?php echo $t['id']; ?>'>Delete</a>
</li>
<?php endwhile; ?>
</ul>
<a href='logout.php'>Logout</a>