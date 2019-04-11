<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

	<!------ content area stats here            ----->
	<div id="content-head">
		<?php  if (logged_in()){?>
		<h3> Welcome to Staff area,  <?php echo strtoupper($_SESSION['username']);}?> </h3>
	</div>
	<div id="content">
              
	<?php //this query will show all available courses
		$sql = $dbh->prepare("SELECT * FROM `meal_course` ");
		$sql->execute();
        ?>
	<h3> Available courses</h3>
	<table>
		<tr>
		   <th>Course Name</th>
		   <th>Course Type</th>
		   <th>Preperation Date</th>
		   <th>Meal Type</th>
                   <th>+ Order</th>
		</tr>
		<tr>
                    <?php while($row_1= $sql->fetch()){ ?>
                    <td><?php echo $row_1['course_name']; ?></td>
                    <td><?php if ($row_1['course_category']== 2){
			echo "Vegetarian";
			}else{
				echo "Non-vegetarian";} ?></td>
                    <td><?php echo $row_1['prep_date']; ?></td>
                    <td><?php  if($row_1['meal_type_id']== 1){
					echo "Starter";}
				if($row_1['meal_type_id']== 2){
					echo "Main Course";}
				if($row_1['meal_type_id']== 3){
					echo "Desserts";}
				if($row_1['meal_type_id']== 4){
					echo "Breakfast";}
				if($row_1['meal_type_id']== 5){
					echo "Refreshment";
				}; ?></td>
                    <td><a href="update_course.php?course_id=<?php echo $row_1['id'];?>"> Select</a> </td>
                    
                     
                </tr>
                <?php  }?>
        </table> </p>
	</div>
	<!------ content area sends here            ----->	
        <?php  if( $_SESSION['status']== 1){
                include("includes/staff_sidebar.php");
        }else{
            include("includes/sidebar.php");
        }
        ?>       
	<?php include("includes/footer.php"); ?>
        
