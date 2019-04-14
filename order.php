<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php

    
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

		$message= 'Hi, '. $fullname . ' Your Order Submited Successfully.';
	}

}else{

}
?>
	
<?php //this query will show all available courses
		//print_r($_SESSION);
		
        ?>
    
<?php include("includes/header.php"); ?>
	<!------ content area stats here            ----->
<div id="content-head"><h3> Welcome ,  <?php echo (strtoupper($_SESSION['username']) )," ";?> Place your Order here... </h3></div>
    <div id="content">
	<?php if (!empty($message)){ echo "<p class=\"message\">" . $message . "</p>";} ?>
	<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>  method="post">
	    
	    <table>
		
		<tr>
		    <td>Meal Type:</td>
		    <td> 
				<div id="show_sub_categories">
			    <select name="meal_type" class="parent">
					<option value="" selected="selected">Select Meal Type</option>
				<?php
					$query = $dbh->prepare("select * from meal_type");
					$query->execute();
					while ($rows = $query->fetch())
				{?>
					<option value="<?php echo $rows['id'];?>"><?php echo $rows['type'];?></option>
				<?php
				}?>
				</select>	
		
				</div>
		    </td>
		</tr>
		<tr>
		    <td>Meal Course :</td>
		    <td> 
				<div id="show_sub_categories">
			    <select name="meal_course" class="parent">
					<option value="" selected="selected">Select Meal Course  </option>
				<?php
					$query = $dbh->prepare("select * from meal_category");
					$query->execute();
					while ($rows = $query->fetch())
				{?>
					<option value="<?php echo $rows['id'];?>"><?php echo $rows['meal_category'];?></option>
				<?php
				}?>
				</select>	
		
				</div>
		    </td>
		</tr>
		<tr>
		    <td>Course Name:</td>
		    <td><select id="course_name" name="course_name" >
				    <?php
				    $sql = $dbh->prepare("SELECT * FROM `meal_course` ");
				    $sql->execute();
				    while($row= $sql->fetch()){
				    ?> 
				    <option value="<?php echo $row['id'];?>"><?php  echo $row ['course_name'];?></option>
				    <?php }?>
				</select></td>
		</tr>
		
		<tr>
		    <td>Servings:</td>
		    <td><input type="course_id" name="servings" maxlength="30" /></td>
		</tr>
		<tr>
		    <td>Order date:</td>
		    <td><?php echo date('Y-m-d');?></td>
		</tr>
		<tr>
		    <td> <label for="date" id="datepicker"/> Booking date:</label></td>
		    <td><input id="date" type="text" name="booking_date" maxlength="30"/><span class= "req" > * </span> </td>
		</tr>
		
		
		<tr>
		    <td></td>
		    <td colspan="2"><input type="submit" class="formbutton" name="submit_order" value="Place Order" />
		     <input type="submit" class="formbutton" name="Reset" value="Cancel" /></td>
		   
	    
		</tr>
	    </table>

	</form>
    </div>
	<!------ content area sends here            ----->	
         <?php include("includes/sidebar.php"); ?>       
	<?php include("includes/footer.php"); ?>
	
        
