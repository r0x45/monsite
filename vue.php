<?php
	include_once('include/connection.inc.php');
	include_once 'include/header.inc.php';
?>
	<div class="span8">
<?php
	$id=$_GET['IDarticle'];
	$sql="SELECT * FROM commentaire WHERE new_id=$id ORDER BY id DESC";
	$req = mysql_query ($sql);
	while($data2=mysql_fetch_assoc($req)){
		echo "*******************************<br>";
		echo "<h4>pseudo : </h4>";
		echo $data2["pseudo"];
		?>
		<br>
		<br>
		<?php 
		echo "<h4>commentaire : </h4>";
		echo "<p>{$data2["comm"]}</p>";
		echo "--------------------------------------<br>";
	}
?>
	</div>
<?php include_once 'include/principale.inc.php'; ?>
<?php include_once 'include/footer.inc.php';?>