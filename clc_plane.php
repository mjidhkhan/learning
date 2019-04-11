<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if (isset($_POST['submit'])){
	//fetching ingredients id's from user input
        $item_1 = htmlentities($_POST['course_1']);
        $item_2 = htmlentities($_POST['course_2']);
        $item_3 = htmlentities($_POST['course_3']);
        $item_4 = htmlentities($_POST['course_4']);
        //fetching no of servings from user input
        $servings = htmlentities($_POST['servings']);
        //fetching ingredients quantities from user input
	$qty_1 = htmlentities($_POST['quantity_1']);
        $qty_2 = htmlentities($_POST['quantity_2']);
        $qty_3 = htmlentities($_POST['quantity_3']);
        $qty_4 = htmlentities($_POST['quantity_4']);
	$sql= "SELECT * FROM ingredients WHERE id = $item_1 LIMIT 1";
	$result = mysql_query($sql);
		echo"<div>";
		echo"<h3>Quantity Check for Meal Coures Preperation</h3>";
		echo"</div>";
		echo "<div>";
		echo "<table border=\"0\" align=\"center\">";
		echo "<tr><th>Ingredient</th>";
		echo "<th>Required Quantity</th>";
		echo "<th>Available Quantity</th>";
		echo "<th>Option</th></tr>";
                while( $row = mysql_fetch_array($result)){
				echo "<tr><td>";
				echo $row ['ingredient_name'];
				echo "</td><td>";
				echo (htmlentities($_POST['quantity_1'])*$servings);
				echo "</td><td>";
				echo $row ['quantity'];
				echo "</td><td>";
						if((htmlentities($_POST['quantity_1'])*$servings)>$row ['quantity']){
						echo "{$row ['ingredient_name']} <label class=\"low\">Not sufficient </label> for $servings Serving(s)";
						}else{
							echo "{$row ['ingredient_name']}   Sufficient for $servings Serving(s)";
						}
				echo "</td></tr>";
		}
		$sql= "SELECT * FROM ingredients WHERE id = $item_2 LIMIT 1";
		$result = mysql_query($sql);
		while( $row = mysql_fetch_array($result)){
				echo "<tr><td>";
				echo $row ['ingredient_name'];
				echo "</td><td>";
				echo (htmlentities($_POST['quantity_2'])*$servings);
				echo "</td><td>";
				echo $row ['quantity'];
				echo "</td><td>";
						if((htmlentities($_POST['quantity_2'])*$servings)>$row ['quantity']){
						echo "{$row ['ingredient_name']} <label class=\"low\">Not sufficient </label> for $servings Serving(s)";
						}else{
							echo "{$row ['ingredient_name']}  Sufficient for $servings Serving(s)";
						}
				echo "</td></tr>";
		}
		$sql= "SELECT * FROM ingredients WHERE id = $item_3 LIMIT 1";
		$result = mysql_query($sql);
		while( $row = mysql_fetch_array($result)){
				echo "<tr><td>";
				echo $row ['ingredient_name'];
				echo "</td><td>";
				echo (htmlentities($_POST['quantity_3'])*$servings);
				echo "</td><td>";
				echo $row ['quantity'];
				echo "</td><td>";
				if((htmlentities($_POST['quantity_3'])*$servings)>$row ['quantity']){
						echo "{$row ['ingredient_name']} <label class=\"low\">Not sufficient </label> for $servings Serving(s)";
						}else{
							echo "{$row ['ingredient_name']}  Sufficient for $servings Serving(s)";
						}
				echo "</td></tr>";
		}
		$sql= "SELECT * FROM ingredients WHERE id = $item_4 LIMIT 1";
		$result = mysql_query($sql);
		while( $row = mysql_fetch_array($result)){
				echo "<tr><td>";
				echo $row ['ingredient_name'];
				echo "</td><td>";
				echo (htmlentities($_POST['quantity_4'])*$servings);
				echo "</td><td>";
				echo $row ['quantity'];
				echo "</td><td>";
				if((htmlentities($_POST['quantity_4'])*$servings)>$row ['quantity']){
						echo "{$row ['ingredient_name']} <label class=\"low\">Not sufficient </label> for $servings Serving(s)";
						}else{
							echo "{$row ['ingredient_name']}  Sufficient for $servings Serving(s)";
						}
				echo "</td></tr>";
		}
		echo "</table>";
		echo "</div>";
		
		
}
?>
<?php include("includes/sidebar.php");?> 
<?php include("includes/footer.php");?>