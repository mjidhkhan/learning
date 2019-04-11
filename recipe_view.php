<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$ing_1 = $_GET['course_id'];
		/*this query will show Ingredients used in Recipe with Quantity used
                         and Remaining quantity in Stock after Updating  Quantaties*/
		$query = $dbh->prepare("SELECT DISTINCT course_name, ingredient_name,qty_used,units
			FROM meal_course
			LEFT JOIN recipes
			ON meal_course.id = recipes.cours_id
			LEFT JOIN ingredients
			ON recipes.item_id = ingredients.id
			WHERE meal_course.id = :ing_one");
        $query->execute(array(':ing_one'=>$ing_1));

			$sql= $dbh->prepare("SELECT *
				FROM Meal_course
				WHERE id = :ing_one");
				$sql->execute(array(':ing_one'=>$ing_1));
				//$result_1= $sql->fetch();
				//$row_2= $sql->fetch();

?>
<?php include("includes/header.php"); ?>
<!------ content area stats here            ----->
 <?php  $name = $query->fetch()['course_name']; ?>
<h3>Course Name:  <?php echo $name; ?></h3>

                       <table>
                            <th>Ingredients</th>
                            <?php while($row_2=   $query->fetch()){ ?>
                              <td>
				    <?php echo $row_2['ingredient_name']; ?>
				    <?php echo $row_2['qty_used']; ?>
				    <?php echo $row_2['units']; ?>
			    </td>
                            <?php  }?>

		       </table>
	<div>
	<!-- donot remove this div it start from sidebar --->
		</div>
	<!----  sidebar div Ends here  ----->
	<!------ content area sends here            ----->

<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>
