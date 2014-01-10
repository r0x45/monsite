<?php require_once 'include/connection.inc.php'; ?>
<?php include_once 'include/header.inc.php'; ?>
 <div class="span8">						 
<?php
if (isset($_POST['connection']))
{
	$Email = $_POST['Email'];
	$mdp = $_POST ['mdp'];
	$sql = ("SELECT * FROM connection WHERE Email = '$Email' and mdp = '$mdp'");
	$execut=mysql_query($sql);
	if($resultat= mysql_fetch_array($execut)){
	echo "Bienvenue $Email";
		
	?>
	<br>
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
	<?php
	$Sid = md5($resultat['Email'].time());
	$sql= ("UPDATE connection SET Sid='$Sid' WHERE id=" .$resultat['id']);
	mysql_query($sql);
	setcookie('Sid',$Sid,time() +3600*24);
	}else{
	echo "connection refuser";
		?>
	<br>
	<br>
	<?php
	echo "vous allez être redirigez dans moins de 3 secondes";
	?>
	<SCRIPT LANGUAGE=JAVASCRIPT>
		function refresh(){
		window.location = 'connection.php';
		}
		var dmc_setInterval = setInterval(refresh,3000);
	</SCRIPT>
	<?php
	}
	} else {
	
	?>
<div>
<FORM action="connection.php" method=post enctype="multipart/form-data" id="form_article">
	<label for="Email"> Email : </label>
     <input type="text" name="Email" value="" id="email" placeholder="Votre e-mail" size="20px" />
     <br>
     <br>
     <label for="mdp"> Mot de passe : </label>
     <input type="password" name="mdp" id="mdp" value="" placeholder="Votre Mot de passe" size="20px" />
	 <br>
	<label> <input type="submit" name="connection" value="connection" id="connection" href="index.php?" /> </label>		
	</div>
<?php }	
?>			
</FORM>
</div>
<?php include_once 'include/principale.inc.php'; ?>
<?php include_once 'include/footer.inc.php';?>
