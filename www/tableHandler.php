<?php
		$result = $connection->query($sql);
		$dataCells = array();  // holds the cells

		// setup the table
		echo '<table border=1 style="border-collapse: collapse; border-color: 
			black;"><thead>'; 

		// print out the column headers
		while ($resultProperties = mysqli_fetch_field($result)) {
			$name = $resultProperties->name;
			if ($name != "ID" && $name != "Actor ID") {
			    echo '<th style="padding: 10px; background-color: LightGray">';
			    echo $name;
			    echo '</th>'; 	// the title cells
			    array_push($dataCells, $name); 
			}
		}
		echo '</thead>'; //end tr tag

		// print out all the data cels
		$colIndex = 0;
		$ID;
		//$mode = $_SESSION['mode'];
		$havePrintedActor = 0;
		while ($row = mysqli_fetch_array($result)) {
		    echo "<tr>";
		    $ID = $row[2];
		    foreach ($dataCells as $cell) {
		        echo '<td style="padding: 10px;">';

		        if ($colIndex == 0) {
		        	if ($mode == "actor") 
		        		echo "<a href='showActorInfo.php?id=$ID'>$row[$cell]</a>";
		        	else if ($mode == "actorInfoMovie")
		        		echo $row[$cell];
		        	else if ($mode == "movie")
		        		echo "<a href='showMovieInfo.php?id=$ID'>$row[$cell]</a>";
		        	else if ($mode == "both") {
		        		echo "<a href='showActorInfo.php?id=$ID'>$row[$cell]</a>";
		        		$mode = "movie";
		        	}
		        	else if ($_SESSION['mode'] == "movieInfoMovie") {
		        		echo "<a href='showActorInfo.php?id=$ID'>$row[$cell]</a>";
		        	}
		        	else 
		        		echo $row[$cell];
		        }
		        else if ($colIndex == 1) {

		        	if ($_SESSION['mode'] == "actorInfoMovie") {
		        		// TODO link the movie title
		        		echo "<a href='showMovieInfo.php?id=$ID'>$row[$cell]</a>";
		        	}
		        	else
		        		echo $row[$cell];
		        }
		        else if (!is_numeric($row[$cell]))
		        	echo $row[$cell];
		        echo '</td>';
		        $colIndex++;
		    }
		    $colIndex = 0;
		    echo '</tr>';
		}
		echo "</table>";
?>