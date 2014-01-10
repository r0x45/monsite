<?php require_once 'include/connection.inc.php'; ?>
<?php include_once 'include/header.inc.php'; ?>

<div class="span8">
    <!-- notifications -->
    <!-- contenu -->
    <?php	
	if (isset($_GET['search']))
	{
		$search=$_GET['search'];
		$message_par_page = 2;
		$page = (isset($_GET['page'])) ? $_GET['page'] : 1; //numéro de page
		$sql = ("SELECT COUNT(*) AS nbarticle FROM article WHERE Publier=1 AND (Titre LIKE '%$search%' OR Texte LIKE '%$search%')");
		$result = mysql_query($sql);
		$data = mysql_fetch_array($result);
		$total = $data['nbarticle'];
		$nb_total = ceil($total / $message_par_page);
		$debut = ($page - 1) * $message_par_page; //index de depart
	    $sql = "SELECT IDarticle ,Texte, Titre , DATE_FORMAT(Date,'%d/%m/%y')as Date FROM article WHERE article.Publier= '1' AND (Titre LIKE '%$search%' OR Texte LIKE '%$search%') ORDER BY date DESC LIMIT $debut, $message_par_page";
	    $requete = mysql_query($sql);
		while ($ligne = mysql_fetch_array($requete))
				{
			echo " <h2> $ligne[Titre] </h2>";
	        echo"<h6><em>l'article est publier $ligne[Date]</em></h6>";
			echo "<img src=\"img/$ligne[IDarticle].jpg\"/><p>$ligne[Texte]</p>";
			echo "$ligne[Texte]";
			?>
			<br>
			<?php
			echo "<a href=\"formulaire.php?IDarticle=$ligne[IDarticle]\">modifier un article </a>"; 
    }
?>
<br>
	<?php	for ($i=1 ; $i <= $nb_total; $i++){
	echo "<a href=\"index.php?page=$i\">$i </a>"; 
	}   
	
    ?>
</div>  

<?php
 $sql = "SELECT IDarticle ,Texte, Titre , DATE_FORMAT(Date,'%d/%m/%y')as Date FROM article WHERE article.Publier= '1' ORDER BY date DESC LIMIT $debut, $message_par_page";
 }

	
	
	
	else {
	$message_par_page = 2;
	$page = (isset($_GET['page'])) ? $_GET['page'] : 1; //numéro de page
	$sql = ("SELECT COUNT(*) AS nbarticle FROM article WHERE Publier=1");
	$result = mysql_query($sql);
	$data = mysql_fetch_array($result);
	$total = $data['nbarticle'];
	$nb_total = ceil($total / $message_par_page);
	$debut = ($page - 1) * $message_par_page; //index de depart
    $sql = "SELECT IDarticle ,Texte, Titre , DATE_FORMAT(Date,'%d/%m/%y')as Date FROM article WHERE article.Publier= '1' ORDER BY Date DESC LIMIT $debut, $message_par_page";
	

    $requete = mysql_query($sql);
	while ($ligne = mysql_fetch_array($requete))
			{
		echo " <h2> $ligne[Titre] </h2>";
        echo"<h6><em>l'article est publier $ligne[Date]</em></h6>";
		echo "<img src=\"img/$ligne[IDarticle].jpg\"/><p>$ligne[Texte]</p>";
		?>
		<br>
		<?php
		echo "<a href=\"formulaire.php?IDarticle=$ligne[IDarticle]\">modifier un article </a>"; 
		?>
	<br>
		<?php
/////////
$sql ="SELECT Titre,IDarticle FROM article";
$req = mysql_query ($sql);
$data=mysql_fetch_assoc($req);

	echo "ecrire un commentaire à propos de:<a href=\"comm.php?IDarticle=$ligne[IDarticle]\">cet article</a><br/>";
	echo "voir les commentaires de:<a href=\"vue.php?IDarticle=$ligne[IDarticle]\">l'article</a><br/>";	
	$sql="SELECT id FROM comment WHERE new_id={$data["IDarticle"]}";
	$req2= mysql_query ($sql);


	
	}
?>
<br>
	<?php	for ($i=1 ; $i <= $nb_total; $i++){
	echo "<a href=\"index.php?page=$i\">$i </a>"; 
	}   
	}
    ?>
</div>  










    <?php include_once 'include/principale.inc.php'; ?>


<?php include_once 'include/footer.inc.php';?>