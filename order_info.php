<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
//print_r($_POST);
//print_r($_SESSION);
/*
meal_category: 1
course_type: 3
meal_type: 2
servings: 4
booking_date: 2019-04-19
submit_order: Place Order

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
		WHERE username =:username ");
	$sql->execute(array(':username'=>$user_name));
	while ($row = $sql->fetch()){
		$u_name= $row['fullname'];
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
	}

}else{

}


//$user_name= $_SESSION['username'];
$query= $dbh->prepare("SELECT * FROM users WHERE id = :customer_id ");
$query->execute(array(':customer_id'=>$customer_id));
while ($row = $query->fetch()){
	$fullname= $row['fullname'];
	$customer_status = $row['status'];
}
if (logged_in()&& $_SESSION['status']== 2){  
    $sql=$dbh->prepare(" SELECT * FROM orders WHERE customer_id = :customer_id");
	    $sql->execute(array(':customer_id'=>$customer_id));
}
else{
	$sql= $dbh->prepare(" SELECT * FROM orders");
	    $sql->execute();
}
?>
<?php include("includes/header.php"); ?>
	<!------ content area stats here            ----->
<div id="content-head">
		<?php  if (logged_in()){?>
		<h3> Welcome,  <?php echo strtoupper($fullname);}?> </h3>
	</div>
	<div id="content">   
	    <table>
		<tr>
		   <th>Customer</th>
		   <th>Course Name</th>
		   <th>Order Date</th>
		   <th>Booking Date</th>
		   <th>Meal Type</th>
		   <th>Course Type</th>
		   <th>Servings</th>
		   <th>Order Status</th>
		</tr>
		<tr><?php
		
		while ($row = $sql->fetch()){
			$customer[] = $row['customer_name'];
			$course[] = $row['course_name'];
			$ord_date[] = $row['order_date'];
			$book_date[] = $row['booking_date'];
			$meal_type[] = $row['meal_type'];
			$course_type[] = $row['course_type'];
			$servings[] = $row['servings'];
			$ord_status[] = $row['order_status'];
        if ($row['order_status']==1){
	    
	    ?>
            <td style='color:red'><?php echo $row['customer_name'];?></td>
		    <td style='color:red'><?php echo $row['course_name']; ?></td>
            <td style='color:red'><?php  echo $row['order_date'];?></td>
            <td style='color:red'><?php echo $row['booking_date'];?></td>
            <td style='color:red'><?php  echo $row['meal_type'] ; ?></td>
		    <td style='color:red'><?php  echo $row['course_type'];?></td>
		    <td style='color:red'><?php  echo $row['servings'];?></td>
		    <td style='color:red'><?php  echo 'Pending'; ?></td>
			<?php
		    }else{
                ?>
            <td><?php echo $row['customer_name'];?></td>
            <td><?php echo $row['course_name']; ?></td>
            <td><?php  echo $row['order_date'];?></td>
            <td><?php echo $row['booking_date'];?></td>
            <td><?php  echo $row['meal_type'] ; ?></td>
            <td><?php  echo $row['course_type'];?></td>
            <td><?php  echo $row['servings'];?></td>
            <td><?php  echo 'Completed'; ?></td>

			<?php };?>
                </tr>
<?php }?>
        </table> 

    </div>
	<!------ content area sends here            ----->	
         <?php include("includes/sidebar.php"); ?>       
	<?php include("includes/footer.php"); ?>
	
	
        
