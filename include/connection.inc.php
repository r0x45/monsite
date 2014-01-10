<?php

	mysql_connect("localhost","root","") or die("imposible de se connecter: ".mysql_error());
	mysql_select_db("napteam");

	if (isset ($_COOKIE['Sid']))
		{
			$connec = $_COOKIE['Sid'];
			$sql="SELECT COUNT(*) as total FROM connection WHERE Sid='$connec'" ;
			$req=mysql_query($sql);
			$data=mysql_fetch_array($req);
			if ($data['total'] > 0)
				{
					echo "Vous êtes connecté";
					$connect=true;
				}
		}
?>
