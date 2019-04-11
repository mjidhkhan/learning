<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php
        if (isset($_POST['submit'])){
	//fetching data from user input
	$u_title = $_POST['title'];
	$username = ($_POST['username']);
        $rating = ($_POST['rating']);
        $your_title = htmlentities(($_POST['your_title']));
        $review = htmlentities($_POST['review']);
            // fetching user id from user table
                $sql_1="SELECT *
                            FROM users 
                            WHERE username = '$username' ";
                    $result_1= mysql_query($sql_1);
                    while($row_1= mysql_fetch_array($result_1)){
                        $user_id = $row_1['id'];
                    }
                    // fetching content id from content tables
                    $sql_2="SELECT *
                            FROM contents 
                            WHERE title = '$u_title' ";
                    $result_2= mysql_query($sql_2);
                    while($row_2= mysql_fetch_array($result_2)){
                        $id = $row_2['id'];
                    }
	// adding review into datbase 
	$query 	= "INSERT INTO review_rating (
                        user_id, cont_id, rating, title, review, date
                    )VALUES(
                        {$user_id},{$id},{$rating},'{$your_title}','{$review}', NOW() )";
		$result = mysql_query($query);
		      if (mysql_affected_rows() == 1) {
		      // if record added we redirect to meals.php
		      redirect_to("meals.php");
		      } else {
		      // Failed
		     $message = "The subject update failed.";
		     $message .= "<br />". mysql_error();
		}
        }
?>
