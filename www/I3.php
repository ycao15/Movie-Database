<!DOCTYPE html>
<html> 
<head> <title> I3 - Add Comments </title> </head>
<link rel="stylesheet" href="S1.css">
<body> 
	<?php include "navbar.php"; ?>
	<div align="center" style="margin-left: 18%; padding: 1px 15px;">
			<h1> Add Comment</h1>
			<form method="GET" action="#" id="form">
				<div >
                  <label for='movieid'>Movie ID</label>
                  <input type='text' class='textBox' name='movieid'>
                </div><br>
                <div >
                  <label for="name">Name</label>
                  <input type="text" class="textBox" name="name" placeholder="Leave blank for anonymous" >
                </div><br>
                <div >
                    <label for="rate">Rating</label>
                    <select class="textBox" name="rate">
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                        <option value=5>5</option>
                    </select>
                </div><br>
               <div>
                <textarea name="comment" cols="60" rows="8" style="width: 50%;
    		border: 2px solid LightGray; border-radius: 4px; font-size: 15px; margin-left: 6%;
    		background-color: #f2f2f2;"></textarea><div><br><br>
                <button type="submit" class="btn btn-default">Add!</button>
            </form>

			<?php
				//error_reporting(E_ALL);
				//ini_set('display_errors', '1');
				//if (! isset($_GET['id'])) 
				//	echo "<h3>Comment Added!</h3>";
				//$movieid = $_GET['id'];

				//session_start();
				$movieID = $_GET['mid'];
				echo "<h3>Enter " . $movieID . " into Movie ID<h3><br>";
				
				//$movieid = $_GET['mid'];
				$servername = "localhost";
				$username = "cs143";
				$password = "";
				$dbname = "CS143";
				$portno = 1432;
				$connection = new mysqli($servername, $username, $password, $dbname);
				
				$movieID = $_GET['movieid'];

				if (isset($_GET['name'])) 
					$name = $_GET['name'];
				$rating = $_GET['rate'];
				$comment = $_GET['comment'];
				if ($name == "")
					$name = "Anonymous";

				date_default_timezone_set('America/Los_Angeles');
				$date = date("Y-m-d h:i:s");
				//echo $date;
				$sql = "insert into Review values ('" . $name . "', '" . $date;
				$sql = $sql . "', " . $movieID . ", " . $rating . ", '" . $comment . "');";
				//echo $sql;

				$result = $connection->query($sql);
				
			?>
			
	</div>
</body>
</html>