<?php require_once("includes/connection.php"); ?>
<?php
$query = "SELECT * FROM course_recipie ";
$result = $query;
 //this query will show all available courses
		$sql = "SELECT * FROM `course_recipie` ";
		$result = mysql_query($sql);
        $sql="SELECT id FROM meal_course
                    ORDER BY id
                    DESC LIMIT 1";
            $result = mysql_query($sql);
            While($row = mysql_fetch_array($result)){
            echo $row['id'];
            $sql= "DELETE FROM
                        meal_course
                        WHERE id = {$row['id']}";
                        $result = mysql_query($sql);
				if (mysqli_affected_rows == 1){
					redirect_to("rcp_plane.php");
				} 
            }
	mysql_close($connection);    
?>
        
