<!DOCTYPE html>
<html style='font-family: sans-serif;'>
<body>

	<h3>Type an SQL query in the following box:</h3> 
	<p> Example: <tt>SELECT * FROM Actor WHERE id=10;</tt><br />

	<p>
	<form method='get' action=
		"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	    <textarea name="query" cols="60" rows="8" style="width: 40%;
    		border: 2px solid LightGray;
    		border-radius: 4px;
    		font-size: 15px;
    		background-color: #f2f2f2;"><?php if(isset($_GET['query'])) { echo ($_GET['query']);}?>
    	</textarea><br/>
	    <input type="submit" value="submit" style="border: none; padding: 10px;
	    	text-decoration: none; background-color: DodgerBlue; font-size: 15px;"/>
	</form>	</p>


	<?php
		//error_reporting(E_ALL);
		//ini_set('display_errors', '1');
		
		$servername = "localhost";
		$username = "cs143";
		$password = "";
		$dbname = "CS143";
		$portno = 1432;

		// Create connection
		$connection = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($connection->connect_errno > 0) {
			echo '<span style="background-color: FireBrick; padding: 5px; border: 1px solid black;">Connection error</span> </br></br>';
			echo '<span style="background-color: LightGray; border: 1px solid black; padding: 5px;">check login details</span>';
		    //die("Connection error: " . $connection->connect_error);
		} 
		else { 
			echo '<span style="background-color: #4CAF50; padding: 5px; border: 1px solid black;">Connected</span>';
			echo '</br> </br>';
		}
	?>

	
	<?php
		/////////////////////////////

		//if( ! isset($_GET['query']) )
			echo '<h3> Results from MySQL</h3>';
		$sql = (string) $_GET['query'];
		//echo $sql;
		$result = $connection->query($sql);
		$dataCells = array();  // holds the cells

		// setup the table
		echo '<table border=1 style="border-collapse: collapse; border-color: 
			black;"><thead>'; 

		// print out the column headers
		while ($resultProperties = mysqli_fetch_field($result)) {
		    echo '<th style="padding: 10px; background-color: LightGray">';
		    $name = $resultProperties->name;
		    echo $name;
		    echo '</th>'; 	// the title cells
		    array_push($dataCells, $name); 
		}
		echo '</thead>'; //end tr tag

		// print out all the data cels
		while ($row = mysqli_fetch_array($result)) {
		    echo "<tr>";
		    foreach ($dataCells as $cell) {
		        echo '<td style="padding: 10px;">';
		        echo $row[$cell];
		        echo '</td>';
		    }
		    echo '</tr>';
		}
		echo "</table>";
	?>

</body>
</html>