<!DOCTYPE html>
<html> 
<head> <title> I - Add Director to Movie Relation </title> </head>
<link rel="stylesheet" href="S1.css">
<body> 
    <?php include "navbar.php"; ?>
    <div align="center" style="margin-left: 18%; padding: 1px 15px;">
        <h1> Add Director to Movie Relation</h1>
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
        <label for="directorid">Director  </label><select class="form-control" name='directorid'><option value=NULL> </option> 

        <?php 
            $servername = "localhost";
            $username = "cs143";
            $password = "";
            $dbname = "CS143";
            $portno = 1432;
            $connection = new mysqli($servername, $username, $password, $dbname);
            
            $dataCells = array();

            $sql = "select concat(first, ' ', last, ' (', dob, ')'), id from Director;";
            
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
        <button type="submit" class="button">Add!</button></div><br>

        </form>
        <?php
            if (isset($_GET['movieid'])) {
                $movieid = $_GET['movieid'];
                $directorid = $_GET['directorid'];
                
                $sql = "insert into MovieDirector values(" . $movieid . ", ";
                $sql = $sql . $directorid . ");" ;

                $connection = new mysqli("localhost", "cs143", "", "CS143");
                $result = $connection->query($sql);
                
            }

            /* testing
                goldeneye ID: 1665
                Willie Aames: 16
            */
        ?>

    </div>
</body>
</html>