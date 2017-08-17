<!DOCTYPE html>
<html> 
<head> <title> I1 - Add Actors and Movies! </title> </head>
<link rel="stylesheet" href="S1.css">
<body> 
	<?php include "navbar.php"; ?>
	<div align="center" style="margin-left: 18%; padding: 1px 15px;">
			<h1> Add Actor or Director</h1>

			<form method = "GET" action="#">
               <label class="radio">
                    <input type="radio" checked="checked" name="table" value="Actor"/>
                    Actor
                </label>
                <label class="radio">
                    <input type="radio" name="table" value="Director"/>Director
                </label>
                <br><br>
                <div>
                  <label for="first_name">First Name</label>
                  <input type="text" class="textBox" placeholder="Text input"  name="firstName"/>
                </div>
                <br><br>
                <div>
                  <label for="last_name">Last Name</label>
                  <input type="text" class="textBox" placeholder="Text input" name="lastName"/>
                </div><br>
                <label class="radio">
                    <input type="radio" name="sex" checked="checked" value="Male">Male
                </label>
                <label class="radio">
                    <input type="radio" name="sex" value="Female">Female
                </label><br><br>
                <div>
                  <label for="DOB">Date of Birth</label>
                  <input type="text" class="textBox" placeholder="Format: 1997-05-05" name="dob"><br><br>
                </div>
                <div>
                  <label for="DOD">Date of Death</label>
                  <input type="text" class="textBox" placeholder="Leave blank if still alive" name="dod"><br>
                </div><br>
                <button type="submit" class="btn btn-default">Add</button>
            </form>

            <?php
            	//unset($_GET['firstName']);
            	if (isset($_GET['firstName'])) {
	            	$dod = $_GET['dod'];
					$dob = $_GET['dob'];
					if (! isset($_GET['dod']) || $dod == '')
						$dod = "NULL";
					else
						$dod = $_GET['dod'];
					if (! isset($_GET['dob']) || $dob == '')
						$dob = "NULL";
					else
						$dob = $_GET['dob'];

					$table = $_GET['table'];

					// get IDs and stuff
					$servername = "localhost";
					$username = "cs143";
					$password = "";
					$dbname = "CS143";
					$portno = 1432;
					$connection = new mysqli($servername, $username, $password, $dbname);

					// get the current max person ID
					$sql = "select id from MaxPersonID";
					$result = $connection->query($sql)->fetch_array();
					$maxID = (int) $result[0];
					//echo $maxID;

					// form the SQL insert statement
	            	$sql = "insert into " . $table . " values (" . $maxID . ', ';
	            	
	            	if ($table == "Actor")
	            		$sql = $sql . "'" . $_GET['lastName'] . "'" . ", " . "'" . $_GET['firstName'];
	            	else if ($table == "Director")
	            		$sql = $sql . "'" . $_GET['lastName'] . "'" . ", " . "'" . $_GET['firstName'] . "', ";
	            	if ($table == "Actor")
	            		$sql = $sql . "', " . "'" . $_GET['sex'] . "', ";
	            	if ($dob != "NULL")
	            		$sql = $sql . "'" . $dob . "', ";
	            	else
	            		$sql = $sql . $dob . ", ";
	            	if ($dod != "NULL")
	            		$sql = $sql . "'" . $dod . "');";
	            	else
	            		$sql = $sql . $dod . ");";

	            		
					//echo $sql;
					$result = $connection->query($sql);
					//echo $result;

					//if ( isset($_GET['firstName']) && $_GET['firstName'] != '') {
						$maxID++;
						$sql = "update MaxPersonID set id = " . $maxID . ";";
						//echo $sql;
						$result = $connection->query($sql);
					//}
				}

			?>
	</div>


</body>
</html>