<?php 
	require_once 'include/connection.inc.php';
	if (isset ($_POST['Ajouter'])){
			$titre = $_POST['titre'];
			$texte = $_POST['texte'];
			$date = date("Y-m-d"); 
			
			$publier = (!empty($_POST['publier'])) ? $_POST['publier'] : 0;
			
			if(!empty($_POST['image'])){
			
			$erreur_image = $_FILES['image']['error'];
		}else{
			$erreur_image = "";
		}
		
		if (!$erreur_image){
			$sql= "INSERT INTO article (Titre,Texte,Date,Publier) VALUES ('$titre','$texte','$date','$publier')";
			mysql_query($sql);	
			echo "<h1>$titre</h1>" ;
			echo "$texte";
			$id = mysql_insert_id();
			move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id.jpg");
		} else {
			echo $erreur_image." / erreur";
		}
		
		} else if (isset ($_POST['Modifier'])){
			$IDarticle = $_POST['IDarticle'];
			$titre = $_POST['titre'];
			$texte = $_POST['texte'];
			$date = date("Y-m-d"); 
			
			$publier = (!empty($_POST['publier'])) ? $_POST['publier'] : 0;
			
			$sql="UPDATE article set titre = '$titre',texte ='$texte',date = '$date' WHERE IDarticle = $IDarticle";
			if(!empty($_POST['image'])){
			
			$erreur_image = $_FILES['image']['error'];
		}else{
			$erreur_image = "";
		}
		if (!$erreur_image){
			//INSERT INTO article (Titre,Texte,Date,Publier) VALUES ('$titre','$texte','$date','$publier')";
			//print_r($sql);
			mysql_query($sql);
			$id = $IDarticle;
			move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id.jpg");
		}
		echo "<h1>$titre</h1>" ;
		echo "$texte";

		 }else {
		if (isset ($_GET ['IDarticle'])) {
		$id = $_GET ['IDarticle'];

		$sql = "SELECT * FROM article WHERE IDarticle = $id";

		$requete = mysql_query($sql);
		$data = mysql_fetch_array($requete);
		extract($data);
				/*echo " <h2> $ligne[Titre] </h2>";
		        echo"<h6><em>l'article est publier $ligne[Date]</em></h6>";
				echo "<img src=\"img/$ligne[IDarticle].jpg\"/><p>$ligne [texte]</p>";
				echo "$ligne[Texte]";
				echo "<a href=\"formulaire.php?IDarticle=$ligne[IDarticle]\">modifier un article </a>"; */
		}else{
			$data = array("IDarticle" =>NULL, "Titre" => "", "Texte" => "", "Date" => "", "Publier" =>"");
		}
		$action_labe = (!empty ($_GET['IDarticle'])) ? 'Modifier':'Choisissez';
		$action_label = (!empty($_GET['IDarticle'])) ? 'Modifier':'Ajouter';
		$action_lab = (!empty($_GET['IDarticle'])) ? 'Publier à nouveau':'Publier';
		require_once 'include/connection.inc.php'; ?>
		<?php include_once 'include/header.inc.php'; ?>
		<div class="span8">
		    <!-- notifications -->
		    <!-- contenu -->
		<?php 
		echo "<h2>$action_label un article</h2>";?>
		    <FORM action="formulaire.php" method=post enctype="multipart/form-data" id="form_article">
			<INPUT type=hidden name="IDarticle" value="<?php echo $data['IDarticle'] ?>">
			<div class="btn btn-large btn-primary">Regigez votre article :
				<br>
				<br>
				<TABLE BORDER=0>
				    <TD>Titre</TD>
				<TR>
					<TD>
					<INPUT type=text name="titre" value="<?php echo $data['Titre'] ?>">
					</TD>
				</TR>
				<TD>Texte</TD>
				<TR>
					<TD>
					<TEXTAREA rows="3" name="texte">
					<?php echo $data['Texte'] ?></TEXTAREA>
					</TD>
				</TR>
				<TD><?php echo $action_lab?></TD>
				<TR>
					<TD>
				 <INPUT type=checkbox name="publier" <?php if ($data ['Publier']==1) { ?> checked="checked" <?php } ?>> 
					
					</TD>
				</TR>
				<TR>
					<TD COLSPAN=2>
					<INPUT type="file" name="image" value="joindre une photo" />
					</TD>
				</TR>
				<TR>
					<TD COLSPAN=2>
					<INPUT type="submit" value="<?php echo $action_label?> le post" name="<?php echo $action_label?>">
					</TD>
				</TR>
				</TABLE>
				</FORM>
			</div>   
		</div>
	    <?php include_once 'include/principale.inc.php'; ?>
		<?php include_once 'include/footer.inc.php';
	}
?>

