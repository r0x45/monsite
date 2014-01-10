<?php
	include_once 'include/connection.inc.php';
	include_once 'include/header.inc.php';
?>
	<div class="span8">
<?php
	$pseudo=$_POST['pseudo'];
	$mail=$_POST['mail'];
	$comm=$_POST['comm'];
	$new_id=$_POST['new_id'];

	$sql="INSERT INTO commentaire (pseudo,mail,comm,new_id)VALUES ('$pseudo','$mail','$comm','$new_id')";
	$req = mysql_query($sql);


	echo "merci pour votre commentaire" ?>
	<br>
	<?php
		echo "vous allez être redirigez dans moins de 3 secondes";
	?>
	<SCRIPT LANGUAGE=JAVASCRIPT>
		function refresh(){	
		window.location = 'index.php';
			}
				var dmc_setInterval = setInterval(refresh,3000);
	</SCRIPT>
</div>
<?php include_once 'include/principale.inc.php'; ?>
<?php include_once 'include/footer.inc.php';?>