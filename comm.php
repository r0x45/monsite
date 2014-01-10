<?php
	include_once('include/connection.inc.php');
	include_once 'include/header.inc.php';
?>
	<div class="span8">
		<?php
			$IDarticle = $_GET['IDarticle'];
			$sql = ("SELECT * FROM article WHERE IDarticle = '$IDarticle'");
			$req = mysql_query ($sql);
			$data = mysql_fetch_assoc ($req);
			echo "<h1> {$data["Titre"]}</h1>";
			echo "<p> {$data["Texte"]}</p>";
			$id=$_GET['IDarticle'];
		?>

		<form action="addcom.php" method="post">
			Pseudo : <input type="text" name="pseudo"/><br>
			Mail : <input type="text" name="mail"/><br>
			Commentaire : <br> <textarea name="comm" style="width:400px;height:300px;"></textarea><br>
			<input type="submit" value ="envoyer"/>
			<input type="hidden" name="new_id" value="<?php echo $id ?>"/>
		</form>
	</div>	
<?php include_once 'include/principale.inc.php'; ?>
<?php include_once 'include/footer.inc.php';?>
