<!DOCTYPE html>
<html> 
<head> <title> I2 - Add Movies! </title> </head>
<link rel="stylesheet" href="S1.css">
<body> 
	<?php include "navbar.php"; ?>
	<div align="center" style="margin-left: 18%; padding: 1px 15px;">
			<h1>Add Movie</h1>

			<form method="GET" action="#" id="form">
                <div >
                  <label for="title">Title</label>
                  <input type="text" class="textBox" placeholder="Text input" name="title">
                </div><br>
                <div >
                  <label for="company">Company</label>
                  <input type="text" class="textBox" placeholder="Text input" name="company">
                </div><br>
                <div >
                  <label for="year">Year</label>
                  <input type="text" class="textBox" placeholder="Text input" name="year">
                </div><br>
                <div >
                    <label for="rating">MPAA Rating</label>
                    <select   class="textBox" name="rate">
                        <option value="G">G</option>
                        <option value="NC-17">NC-17</option>
                        <option value="PG">PG</option>
                        <option value="PG-13">PG-13</option>
                        <option value="R">R</option>
                    </select>
                </div><br>
                <div >
                    <label >Genre:</label>
                    <input type="checkbox" name="genre[]" value="Action">Action</input>
                    <input type="checkbox" name="genre[]" value="Adult">Adult</input>
                    <input type="checkbox" name="genre[]" value="Adventure">Adventure</input>
                    <input type="checkbox" name="genre[]" value="Animation">Animation</input>
                    <input type="checkbox" name="genre[]" value="Comedy">Comedy</input>
                    <input type="checkbox" name="genre[]" value="Crime">Crime</input>
                    <input type="checkbox" name="genre[]" value="Documentary">Documentary</input>
                    <input type="checkbox" name="genre[]" value="Drama">Drama</input>
                    <input type="checkbox" name="genre[]" value="Family">Family</input>
                    <input type="checkbox" name="genre[]" value="Fantasy">Fantasy</input>
                    <input type="checkbox" name="genre[]" value="Horror">Horror</input>
                    <input type="checkbox" name="genre[]" value="Musical">Musical</input>
                    <input type="checkbox" name="genre[]" value="Mystery">Mystery</input>
                    <input type="checkbox" name="genre[]" value="Romance">Romance</input>
                    <input type="checkbox" name="genre[]" value="Sci-Fi">Sci-Fi</input>
                    <input type="checkbox" name="genre[]" value="Short">Short</input>
                    <input type="checkbox" name="genre[]" value="Thriller">Thriller</input>
                    <input type="checkbox" name="genre[]" value="War">War</input>
                    <input type="checkbox" name="genre[]" value="Western">Western</input>
                </div><br>
                <button type="submit" class="btn btn-default">Add!</button>
            </form>


            <?php
                //error_reporting(E_ALL);
                //ini_set('display_errors', '1');
            	if (isset($_GET['title'])) {
            		$title = $_GET['title'];
            		$year = $_GET['year'];
            		$rating = $_GET['rate'];
            		$company = $_GET['company'];
            		$genre = $_GET['genre'];

            		$servername = "localhost";
					$username = "cs143";
					$password = "";
					$dbname = "CS143";
					$portno = 1432;
					$connection = new mysqli($servername, $username, $password, $dbname);

					// get the current max person ID
					$sql = "select id from MaxMovieID";
					$result = $connection->query($sql)->fetch_array();
					$maxMovieID = $result[0];

					$sql = "insert into Movie values (" . $maxMovieID;
					$sql = $sql . ", \"" . $title . "\", " . $year . ", ";
					$sql = $sql . "'" . $rating . "', " . "'" . $company . "');";
					//echo $sql;
					$result = $connection->query($sql);

            		// insert genres
            		echo "<br>";
            		foreach ($genre as $g) {
            			//echo $g . "<br>";
            			$sql = "insert into MovieGenre values (" . $maxMovieID;
            			$sql = $sql . ", '" . $g . "');";
            			//echo $sql . "<br>";
            			$result = $connection->query($sql);
            		}

            		if ($title != "") 
            		$sql = "update MaxMovieID set id = id + 1;";
            		$result = $connection->query($sql);

                    unset($_GET['title']);
            	}
            ?>
	</div>
</body>
</html>