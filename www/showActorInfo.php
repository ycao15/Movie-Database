<!DOCTYPE html>
<html> 
<head> <title> Actor Information </title> </head>
<link rel="stylesheet" href="S1.css">
<body> 
	<?php include "navbar.php";?>
	<div align="center" style="margin-left: 15%; padding: 1px 15px;">
		<h1>Actor Information</h1>

		<?php
			//session_start();
			$actor = $_SESSION['searchedActor'];
			$actorID = $_GET['id'];
			//echo $actorID;

			$servername = "localhost";
			$username = "cs143";
			$password = "";
			$dbname = "CS143";
			$portno = 1432;

			// Create connection
			$connection = new mysqli($servername, $username, $password, $dbname);

			$words_in_query;
			preg_match_all('/(\S{1,})/i', $actor, $words_in_query);
			//print_r($words_in_query[0]);

			$sql = "select concat(first, ' ', last) as Name, sex as Sex, id as ID, dob as 'Date of Birth', dod as 'Date of Death'
					from Actor
					where Actor.id = " . $actorID . ";";
			$_SESSION['mode'] = "actor";
			include "tableHandler.php";

			echo "<h3> Movies and Roles </h3>";

			$sql = "select MA.role as Role, M.title as Title, M.id as ID
					from Movie as M, MovieActor as MA, Actor as A
					where M.id = MA.mid
					and A.id = MA.aid
					and A.id = " . $actorID . ";";
			$_SESSION['mode'] = "actorInfoMovie";
			include "tableHandler.php";
		?>

		<br>
		<a href=B1.php style="background-color: dodgerblue; width: 23%; color: black; border-radius: 3px; border: 1px solid black;">Return to Browsing Actors</a>


	</div>
</body>
</html>