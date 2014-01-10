<?php require_once 'include/connection.inc.php'; ?>
<?php include_once 'include/header.inc.php'; ?>
<div class="span8">
<?php
	setcookie('Sid', FALSE, time() - 3600*24); // en inversant le temps du cookie il deviendra nul et sera donc enlever
?>
<?php
	echo "merci de votre vitise à bientôt!";
?>
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