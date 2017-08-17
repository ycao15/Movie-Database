<!DOCTYPE html>
<html> 
<head> <title> B1 - Browse Actors </title> </head>
<link rel="stylesheet" href="S1.css">
<body> 
	<?php include "navbar.php";?>
	<div align="center" style="margin-left: 18%; padding: 1px 15px;">
		<h1> Browse Actors </h1>

		<form class="form-group" method ="GET" id="usrform">
        	<input type="text" id="search_page_bar" class="search_bar" placeholder="   Enter Actor Name" name="query" value="<?php if(isset($_GET['query'])) { echo ($_GET['query']);}?>">
        	</br></br>
            <input type="submit" value="Enter" class="submit_button">
        </form>

		<?php

			//session_start();
			$_SESSION['mode'] = "actor";
			$actor = $_SESSION['searchedActor'];

			if( isset($_GET['query']) && $_GET['query'] != "" )
				include "queryHandler.php";
			
			//ob_start();
			//ob_end_clean();
		?>


	</div>
</body>
</html>