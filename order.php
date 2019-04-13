<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php

    
if (isset($_POST['submit'])){
	// Perform Update
    $id = htmlentities($_POST['course_id']);
	$course_name = htmlentities($_POST['course_name']);
    $prep_date = htmlentities($_POST['prep_date']);
	$course_type = htmlentities($_POST['course_category']);
	$time_to_prepare  = htmlentities($_POST['time_to_prepare']);
	$course_notes  = htmlentities($_POST['course_notes']);
	$course_instructions  = htmlentities($_POST['course_instructions']);
	$meal_type_id = htmlentities($_POST['meal_type_id']);
    }
?>
	
<?php //this query will show all available courses
		//print_r($_SESSION);
		
        ?>
    
<?php include("includes/header.php"); ?>
	<!------ content area stats here            ----->
<div id="content-head"><h3> Welcome ,  <?php echo (strtoupper($_SESSION['username']) )," ";?> Place your Order here... </h3></div>
    <div id="content">
	<form action="order_info.php" method="post">
	    
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
		    <td><select id="course_name" name="course_names" >
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
	
        
