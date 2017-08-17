<!DOCTYPE html>
<html> 
<head> <title> I4 - Add Actor to Movie Relation </title> </head>
<link rel="stylesheet" href="S1.css">
<body> 
	<?php include "navbar.php"; ?>
	<div align="center" style="margin-left: 18%; padding: 1px 15px;">
		<h1> Add Actor to Movie Relation</h1>
		<form method = 'GET' action='#'> <div class="form-group"><label for="movieid">Movie Title   </label><select class="form-control" name='movieid'><option value=NULL> </option>
		
		<?php
			$servername = "localhost";
			$username = "cs143";
			$password = "";
			$dbname = "CS143";
			$portno = 1432;
			$connection = new mysqli($servername, $username, $password, $dbname);
			
			$dataCells = array();
			$sql = "select concat(title, ' (', year, ')'), id from Movie;";

			$result = $connection->query($sql);
			while ($resultProperties = mysqli_fetch_field($result)) {
			    $name = $resultProperties->name;
			    array_push($dataCells, $name); 
			}
			
			$colIndex = 0;
			$movieName;
			while ($row = mysqli_fetch_array($result)) {
				foreach ($dataCells as $cell) {
					if ($colIndex == 0){
						$movieName = $row[$cell];
					}
					else if ($colIndex == 1) {
						echo "<option value=" . $row[$cell] . ">" . $movieName;
						echo "</option>";
					}

					$colIndex++;
				}
				$colIndex = 0;
			}
		?>
		</select></div><br>
		<label for="actorid">Actor   </label><select class="form-control" name='actorid'><option value=NULL> </option> 

		<?php 
			$servername = "localhost";
			$username = "cs143";
			$password = "";
			$dbname = "CS143";
			$portno = 1432;
			$connection = new mysqli($servername, $username, $password, $dbname);
			
			$dataCells = array();

			$sql = "select concat(first, ' ', last, ' (', dob, ')'), id from Actor;";
			
			$result = $connection->query($sql);
			while ($resultProperties = mysqli_fetch_field($result)) {
			    $name = $resultProperties->name;
			    array_push($dataCells, $name); 
			}
			
			$colIndex = 0;
			$actorName;
			while ($row = mysqli_fetch_array($result)) {
				foreach ($dataCells as $cell) {
					if ($colIndex == 0){
						$actorName = $row[$cell];

					}
					else if ($colIndex == 1) {
						echo "<option value=" . $row[$cell] . ">" . $actorName;
						echo "</option>";
					}

					$colIndex++;
				}
				$colIndex = 0;
			}
		?>
		</select><br><br>
		<div>
            <label for="role">Role</label>
            <input type="text" class="textBox" placeholder="Text input" name="role">
        </div><br>
        <button type="submit" class="button">Add!</button></div><br>

		</form>
		<?php
			if (isset($_GET['movieid'])) {
				$movieid = $_GET['movieid'];
				$actorid = $_GET['actorid'];
				$role = $_GET['role'];
				
				$sql = "insert into MovieActor values(" . $movieid . ", ";
				$sql = $sql . $actorid . ", '" . $role . "');" ;
				echo $sql;

				$connection = new mysqli("localhost", "cs143", "", "CS143");
				$result = $connection->query($sql);
				
			}
		?>

	</div>
</body>
</html>