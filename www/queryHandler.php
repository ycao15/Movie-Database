<?php
		//error_reporting(E_ALL);
		//ini_set('display_errors', '1');
		//ob_end_clean();
		$servername = "localhost";
		$username = "cs143";
		$password = "";
		$dbname = "CS143";
		$portno = 1432;

		// Create connection
		$connection = new mysqli($servername, $username, $password, $dbname);

		/////////////////////////////
		///// 	HANDLE ACTOR 	/////
		/////////////////////////////

		$mode = $_SESSION['mode'];
		
		if ($mode == "both" or $mode == "actor") {

		if( isset($_GET['query']) )
			echo '<h3> Actors Found </h3>';

		$result = (string) $_GET['query'];
		$sql = "select concat(first, ' ', last) as Actor, dob as 'Date of Birth', id as ID
				from Actor 
				where ";
		//echo $sql;
		$words_in_query;
		preg_match_all('/(\S{1,})/i', $result, $words_in_query);
		//print_r($words_in_query[0][6]);

		// append the "like" statements from the first search word to the query
		$firstWord = $words_in_query[0][0];

		$sql = $sql . "(first like '%" . $firstWord . "%' OR last like '%" . $firstWord . "%') ";
		//echo $sql;
	
		// delete first item from the array
    	array_splice($words_in_query[0], 0, 1);
		echo "<br>";
		foreach ($words_in_query[0] as $word) {
			$sql = $sql . "and " . "(first like '%" . $word . "%' OR last like '%" . $word . "%')";
			//print_r($word);
		}
		$sql = $sql . ";";
		//echo $sql;
		
		include 'tableHandler.php';
		}

		/////////////////////////////
		///// 	HANDLE MOVIE 	/////
		/////////////////////////////
		
		if ($mode == "both" or $mode == "movie") {
			$mode = "movie";
		echo "</br>";
		echo '<h3> Movies Found </h3>';

		$result = (string) $_GET['query'];
		$sql = "select title as Title, year as Year, id as ID
				from Movie 
				where ";
		//echo $sql;
		$words_in_query;
		preg_match_all('/(\S{1,})/i', $result, $words_in_query);
		//print_r($words_in_query[0][6]);

		// append the "like" statements from the first search word to the query
		$firstWord = $words_in_query[0][0];

		$sql = $sql . "title like '%" . $firstWord . "%' ";
		//echo $sql;
	
		// delete first item from the array
    	array_splice($words_in_query[0], 0, 1);
		echo "<br>";
		foreach ($words_in_query[0] as $word) {
			$sql = $sql . "and " . "title like '%" . $word . "%' ";
			//print_r($word);
		}
		$sql = $sql . ";";
		//echo $sql;
		
		include 'tableHandler.php';
		}

		//$_SESSION['searchedActor'] = "Tom Hanks";
 ?>