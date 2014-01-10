      </div>
	  <footer>
        <p>&copy; ULCO 2013 - 2014</p>
			  <label for="search">
			  <form action="index.php" method="GET">
			  <input type="submit" value="Recherche" name="" /> </label>
                 <input type="text" name="search" id="search" placeholder="Votre recherche" size="20px" /></form>
			<?php
			if (isset($_GET['aucunresult']))
			{
			echo "désoler il n'y a aucun résultat pour votre recherche";
			UNSET($_GET['aucunresult']);
			}	?> 
      </footer>