<?php
 require_once("includes/session.php"); 
 require_once("includes/functions.php"); 
 require_once("includes/connection.php"); 

if (isset($_POST['submit'])){
	$u_title = $_POST['title'];
	$username =$_SESSION['username'];
    $rating = $_POST['rating'];
    $your_title = htmlentities($_POST['your_title']);
    $review = htmlentities($_POST['review']);
    $date = date("Y-m-d H:i:s");
    // fetching user id from user table
    $sql= $dbh->prepare("SELECT * FROM users  WHERE username =:username");
    $sql->execute(array(':username'=> $username));

   
    while($row = $sql->fetch()){
       echo $user_id = $row['id'];
    }
    // fetching content id from content tables
    $selectTitle= $dbh->prepare("SELECT * FROM contents WHERE title =:title");
    $selectTitle->execute(array(':title'=> $u_title));
    while($titles= $selectTitle->fetch()){
         $id = $titles['id'];
    }
	// adding review into datbase 
	$query 	= $dbh->prepare( "INSERT INTO review_rating (user_id, cont_id, rating, cont_title, review, date )
                              VALUES(:user_id, :cont_id, :rating, :cont_title, :review, :date)");
   if  ($query->execute(array(':user_id'=>$user_id, ':cont_id'=>$id, ':rating'=>$rating, ':cont_title'=>$your_title,':review'=>$review, ':date'=>$date)))
    {
                            redirect_to("meals.php");
    } else {
             
              // @TODO: creat error page here
		echo $message = "The subject update failed.";
	}
}
?>
