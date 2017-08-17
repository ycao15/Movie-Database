<!DOCTYPE html>
<html> 
<head> <title> Movie Information </title> </head>
<link rel="stylesheet" href="S1.css">
<body> 
	<?php include "navbar.php";?>
	<div align="center" style="margin-left: 15%; padding: 1px 15px;">
		<h1>Movie Information</h1>

		<?php
			//error_reporting(E_ALL);
			//ini_set('display_errors', '1');
			$ID = $_GET['id'];
			$movieID = $ID;

			$servername = "localhost";
			$username = "cs143";
			$password = "";
			$dbname = "CS143";
			$portno = 1432;

			// Create connection
			$connection = new mysqli($servername, $username, $password, $dbname);

			$_SESSION['mode'] = "movie";

			
			// print movie info
			$sql = "select M.title as Title, M.year as Year, M.id as ID, M.company as Producer, M.rating as 'MPAA Rating', GROUP_CONCAT(distinct MG.genre order by MG.genre SEPARATOR ', ') as Genre
					from Movie M, MovieGenre MG
					where M.id = " . $ID . 
					" and M.id = MG.mid;";
			//echo $sql;
			include "tableHandler.php";
			
			echo "<br><br>";
			// print movie director (sometimes nonexistent in database)
			$sql = "select concat(D.first, ' ', D.last) as Director 
					from Movie M, MovieDirector MD, Director D
					where M.id = " . $ID . 
					" and M.id = MD.mid and MD.did = D.id;";
			include "tableHandler.php";


			echo "<br><br>";
			// print actors and roles
			$sql = "select concat(A.first, ' ', A.last) as Actor, MA.role as Role, A.id as 'Actor ID'
					from Actor A, Movie M, MovieActor MA
					where M.id = " . $movieID . 
					" and M.id = MA.mid and MA.aid = A.id;";
			$_SESSION['mode'] = "movieInfoMovie";
			$_GET['id'] = $movieID;
			//echo $ID;
			include "tableHandler.php";
			

			echo "<br>";
			$_GET['id'] = $movieID;
        ?>

		<a href=B2.php style="background-color: dodgerblue; width: 23%; color: black; border-radius: 3px; border: 1px solid black;">Return to Browsing Movies</a>
		<br><br><br>

		<?php 
			
			$movieID = $_GET['id'];
			//echo $movieID;
			echo "<a href='I3.php?mid=$movieID'  style='background-color: dodgerblue; width: 23%; color: black; border-radius: 3px; border: 1px solid black;''>Add Comment</a>";

			$connection = new mysqli("localhost", "cs143", "", "CS143");

			// output average rating
			$sql = "select round(avg(rating), 1) as avg from Review where mid = " . $movieID . ";";
			$result = $connection->query($sql)->fetch_array();
			$averageRating = $result[0];
			echo "<h3>Average Rating: " . $averageRating . "/5</h3>";


			$sql = "select name as Reviewer, comment as Comments
					from Review where mid = " . $movieID . ";";

			$_SESSION['mode'] = "movie";
			include "tableHandler.php";
			
		?>
	</div>
</body>
</html>