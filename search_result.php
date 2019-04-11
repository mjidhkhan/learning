<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<?php
    $var= htmlentities($_GET['search']);
   $trimmed = trim($var);
    if (!isset($var))
  {
  echo "<p>We dont seem to have a search parameter!</p>";
  exit;
  }
?>
	<!------ content area stats here            ----->
<?php
	//this query will show all available courses
        $sql = $dbh->prepare("SELECT * FROM meal_course
		                          WHERE course_name like :item
		                          OR course_type like :item
		                          ORDER BY  course_name");
	$sql->execute(array(':item'=> '%'.$trimmed.'%'));
	$items=$sql->rowCount();
	if ($items != 0){
?>
	<h3> Result for your search: "<?php echo $trimmed;?> "</h3>
	<?php echo "<p>item(s) found : <strong style='color:red'> " . $items . " </strong></p>" ?>


	<table>
		<tr>
		   <th>Course Name</th>
		   <th>Course Type</th>
		   <th>Meal Type</th>
                   <th> + Order</th>
		</tr>
		<tr class="clchange">
	<?php while($row= $sql->fetch()){ ?>
                  <td><?php echo $row['course_name']; ?></td>
		  <td><?php if ($row['course_type']== 2){
			echo "Vegetarian";
			}else{
				echo "Non-vegetarian";} ?></td>
		  <td><?php  if($row['meal_cat_id']== 1){
					echo "Lunch";}
				if($row['meal_cat_id']== 2){
					echo "Dinner";}
				if($row['meal_cat_id']== 3){
					echo "Desserts";}
				if($row['meal_cat_id']== 4){
					echo "Breakfast";}
				if($row['meal_cat_id']== 5){
					echo "Refreshment";}
			    ?>
        </td>
        <td><a href="order.php?item_id=<?php echo $row['id'];?>"> Select</a> </td>
      </tr>
	<?php };?>
	</table>
	<?php
	}else{
		echo "<h4>Results</h4>";
		echo "<p>Sorry, your search for:  &quot;<strong style='color:red'>" . $trimmed . "</strong>  &quot; returned zero results</p>";
	    }?>
	<!------ content area sends here            ----->

         <?php include("includes/sidebar.php"); ?>

	<?php include("includes/footer.php"); ?>
