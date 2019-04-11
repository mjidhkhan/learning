<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

	<!-- content area stats here            ----->
        <?php  if (logged_in()){?>
        <h3> Welcome to Staff area,  <?php echo strtoupper($_SESSION['username']);}?> </h3><hr>
        <?php //this query will show if ingredients quantatiy is low we set the standar of 250 g/ml
		$sql = $dbh->prepare("SELECT * FROM ingredients WHERE quantity <= 250 ");
		//$result = mysql_query($sql);
    $sql->execute();
                if ($row= $sql->fetch() != 0){ ?>
                    <h3>Some of Ingredients has Low Quantity in stock </h3>
                <table>
                    <tr>
                        <th>Ingredient</th>
                        <th>Qyantity</th>
                        <th>Update</th>
                    </tr>
            <?php }?>
            <?php  while($row= $sql->fetch()){?>
                    <tr>
                        <td class="low"><?php echo $row['ingredient_name']; ?></td>
                        <td class="low"><?php echo $row['quantity']; ?></td>
                        <td><a href="manage_stock.php?id=<?php echo $row['id'];?>"> Update</a> </td>
                    </tr>
            <?php }?>
                </table> <hr>

	<?php //this query will show all available courses
		$sql =  $dbh->prepare( "SELECT * FROM `meal_course` ");
	  $sql->execute();
        ?>
	<h3> Available courses</h3>
	<table>
		<tr>
		   <th>Course Name</th>
		   <th>Course Type</th>
		   <th>Preperation Date</th>
		   <th>Meal Type</th>
            <th>Modify</th>
            <th>Recipe</th>
		</tr>
		<tr>
                    <?php while($row_1= $sql->fetch()){ ?>
                    <td><?php echo $row_1['course_name']; ?></td>
                    <td><?php if ($row_1['course_type']== 2){
			echo "Vegetarian";
			}else{
				echo "Non-vegetarian";} ?></td>
                  <td><?php echo $row_1['prep_date']; ?></td>
                    <td><?php  if($row_1['meal_cat_id']== 1){
					                echo "Starter";}
				                if($row_1['meal_cat_id']== 2){
					                echo "Main Course";}
				                if($row_1['meal_cat_id']== 3){
					                echo "Desserts";}
				                if($row_1['meal_cat_id']== 4){
					                echo "Breakfast";}
				                if($row_1['meal_cat_id']== 5){
					                echo "Refreshment";
				                }; ?></td>
                    <td><a href="update_course.php?course_id=<?php echo $row_1['id'];?>"> Update</a> </td>
                    <td><a href="recipe_view.php?course_id=<?php echo $row_1['id'];?>"> View</a> </td>

                </tr>
                <?php  }?>
        </table>
	<!-- content area sends here            ----->
        <?php  if( $_SESSION['status']== 1){
                include("includes/staff_sidebar.php");
        }else{
            include("includes/sidebar.php");
        }
        ?>
	<?php include("includes/footer.php"); ?>
