<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
print_r($_POST);
if( !empty($_POST)){
$id = ($_POST['course_id']);
$user_name= $_SESSION['username'];
$course_id = ($_POST['course_id']);
$course_type = ($_POST['meal_category']);
$meal_type = ($_POST['meal_type']);
$servings  = ($_POST['servings']);
$date  = ($_POST['booking_date']);
$ord_date = date('Y-m-d');
$ord_status= 1;


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
echo $course_id;
echo "</br>servings:" ; 
echo $servings;
}else{

}










/* Fetching user_id on the bases of login user */
$sql= $dbh->prepare("SELECT * FROM users
	 WHERE username =:username ");
$sql->execute(array(':username'=>$user_name));
while ($row = $sql->fetch()){
	$u_name= $row['fullname'];
	}
/*  INSERting DATA to orders Table */
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

?>
<?php
    $user_name= $_SESSION['username'];
    $query= $dbh->prepare("SELECT * FROM users WHERE username = :user_name ");
	$query->execute(array(':user_name'=>$user_name));
	while ($row = $query->fetch()){
	    $u_name= $row['fullname'];
	    }
	 if (logged_in()&& $_SESSION['status']== 2){  
    $sql=$dbh->prepare(" SELECT *
            FROM orders
	    WHERE customer_name = :u_name");
	    $sql->execute(array(':u_name'=>$u_name));
	 }
	 else{
	    $sql= $dbh->prepare(" SELECT *
            FROM orders");
	    $sql->execute();
	 }
?>
<?php include("includes/header.php"); ?>
	<!------ content area stats here            ----->
<div id="content-head">
		<?php  if (logged_in()){?>
		<h3> Welcome,  <?php echo strtoupper($_SESSION['username']);}?> </h3>
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
	
	
        
