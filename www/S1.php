<!DOCTYPE html>
<html> 
<head> <title> S1 - Search Actors and Movies! </title> </head>
<link rel="stylesheet" href="S1.css">
<body> 
	<?php include "navbar.php"; ?>
	<div align="center" style="margin-left: 18%; padding: 1px 15px;">
			<h1>Search Page</h1>
			<!-- add align="center" to make the text all in the center -->
		<form class="form-group" method ="GET" id="usrform">
        	<input type="text" id="search_page_bar" class="search_bar" placeholder="   Enter Actor/Movie" name="query" value="<?php if(isset($_GET['query'])) { echo ($_GET['query']);}?>">
        	</br></br>
            <input type="submit" value="Enter" class="submit_button">
        </form>

        <?php 
        	//session_start();
        	$_SESSION['mode'] = "both";
        	if( isset($_GET['query']) && $_GET['query'] != "" )
        		include "queryHandler.php"; 
        ?>
	</div>
	
</body>
</html>