<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>
<?php

/*
	print_r($_SESSION);
    $id = ($_POST['course_id']);
	$user_name= $_SESSION['username'];
	$course_name = ($_POST['course_name']);
	$course_type = ($_POST['course_category']);
	$meal_type = ($_POST['meal_type_id']);
	$servings  = ($_POST['servings']);
	$date  = ($_POST['date']);
	$ord_date = date('Y-m-d');
	$ord_status= 1;


	$customer_id = $_SESSION['user_id'];
	$meal_type = ($_POST['meal_type']);
	$meal_course = ($_POST['meal_course']); // Meal Course Type [1-5 : Startesn Main Course,...]
	$course_id = ($_POST['course_name']); 
	$servings  = ($_POST['servings']);
	$booking_date  = ($_POST['booking_date']);
	$order_date = date('Y-m-d');
	$order_status= 1;







	/* Fetching user_id on the bases of login user *
	$sql= "SELECT * FROM users
	     WHERE username =:username ";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)){
	    $u_name= $row['fullname'];
	    }
	/*  INSERting DATA to orders Table *
	$sql = "INSERT INTO orders ( 
                            customer_name, order_date , booking_date, meal_type, course_type, course_name , servings, order_status
                            ) VALUES (
                            '{$u_name}', '$ord_date', '$date','{$meal_type}','{$course_type}','{$course_name}','$servings','$ord_status'
                            )";
			    $result = mysql_query($sql);
			 
	echo "</br> customer_id:" ;  
	echo $user_name;
	echo "</br>order_date:" ;
	
	echo $ord_date;
	echo "</br>booking_date:" ; 
	echo $date;
	echo "</br>meal_type:" ; 
	echo $meal_type;
	echo "</br>course_type:" ; 
	echo $course_type;
	echo "</br>course_name:" ; 
	echo $course_name;
	echo "</br>servings:" ; 
	echo $servings;
	/* Fetching meal_category on the bases of order selection 
	$sql2= "SELECT * FROM meal_category
	     WHERE meal_type = '$meal_type' ";
	$result2 = mysql_query($sql);
	while ($row2 = mysql_fetch_array($result2)){
	    $m_id= $row2['id'];
	    }*/
	/*  INSERting DATA to order_detaila Table *
	/*$sql2 = "INSERT INTO order_details (
                            meal_type,course_type, course_id , cust_id, servings
                            ) VALUES (
                            '$meal_type','$course_type', '$id', '$u_id','$servings'
                            )";
			    $result2 = mysql_query($sql2);*
	
	//	redirect_to("index.php");

*/
	if( !empty($_POST)){
		$customer_id = $_SESSION['user_id'];
		$meal_type = ($_POST['meal_type']);
		$meal_course = ($_POST['meal_course']); // Meal Course Type [1-5 : Startesn Main Course,...]
		$course_id = ($_POST['course_name']); 
		$servings  = ($_POST['servings']);
		$booking_date  = ($_POST['booking_date']);
		$order_date = date('Y-m-d');
		$order_status= 0;
		$sql= $dbh->prepare("SELECT * FROM users
			WHERE id =:customer_id ");
		$sql->execute(array(':customer_id'=>$customer_id));
		while ($row = $sql->fetch()){
			$fullname= $row['fullname'];
		}
		/*  INSERting DATA to orders Table */
		$sql = $dbh->prepare("INSERT INTO orders ( customer_id, order_date,  booking_date, servings, order_status)
							VALUES (:customer_id, :order_date, :booking_date, :servings, :order_status)");
		$sql->execute(array(':customer_id'=>$customer_id,':order_date'=>date('Y-m-d'), ':booking_date'=>$booking_date, ':servings'=>$servings, ':order_status'=>$order_status));
		$order_id = $dbh->lastInsertId();
		if($order_id> 0){
			$sql = $dbh->prepare("INSERT INTO order_details ( order_id,  meal_category, meal_course, meal_type)
									VALUES (:order_id, :meal_category, :meal_course, :meal_type)");
			$sql->execute(array(':order_id'=>$order_id, ':meal_category'=>$meal_course, ':meal_course'=>$course_id, ':meal_type'=>$meal_type));

			$message= 'Hi, '. $fullname . ' Order Submited Successfully.';
		}
	
	}else{
	
	}
?>
