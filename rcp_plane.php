<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<h3> Welcome , <?php echo $_SESSION['username'];?> </h3><p>
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

	$sql_1= $dbh->prepare("SELECT * FROM ingredients WHERE id = :item_1 LIMIT 1");
	$sql_1->execute(array('item_1'=>$item_1));
	while( $row =$sql_1->fetch()){
	$stock_1 = $row ['quantity'];
	$name_1 = $row['ingredient_name'];
	$calc_1 = ((htmlentities($_POST['quantity_1'])*$servings)>$stock_1);
	}
	$sql_2= $dbh->prepare("SELECT * FROM ingredients WHERE id = :item_2 LIMIT 1");
	$sql_2->execute(array('item_2'=>$item_2));
	while( $row = $sql_2->fetch()){
	$stock_2 = $row ['quantity'];
	$name_2 = $row['ingredient_name'];
	$calc_2 = ((htmlentities($_POST['quantity_1'])*$servings)>$stock_2);
	}
	$sql_3= $dbh->prepare("SELECT * FROM ingredients WHERE id = :item_3 LIMIT 1");
	$sql_3->execute(array('item_3'=>$item_3));
	while( $row = $sql_3->fetch()){
	$stock_3 = $row ['quantity'];
	$name_3 =$row['ingredient_name'];
	$calc_3 = ((htmlentities($_POST['quantity_1'])*$servings)>$stock_3);
	}
	$sql_4= $dbh->prepare("SELECT * FROM ingredients WHERE id = :item_4 LIMIT 1");
  $sql_4->execute(array('item_4'=>$item_4));
	while( $row = $sql_4->fetch()){
	$stock_4 = $row ['quantity'];
	$name_4 = $row['ingredient_name'];
	$calc_4 = ((htmlentities($_POST['quantity_1'])*$servings)>$stock_4);
	}
		echo"<div>";
		echo"<h3>Quantity Check for Meal Coures Preparation</h3>";
		echo"</div>";
		echo "<div>";
		echo "<table border=\"0\" align=\"center\">";
		echo "<tr><th>Ingredient</th>";
		echo "<th>Quantity/ serving</th>";
		echo "<th>Required Quantity</th>";
		echo "<th>Available Quantity</th>";
		echo "<th>Preparation Option</th>";
		if($calc_1= true||$calc_2=true||$calc_3=true||$calc_4=true){
		       echo "<th>Suggested</th>";
		       echo "<th>Action</th></tr>";}
		       echo "<tr><td>";
		       echo $name_1;
		       echo "</td><td>";
		       echo htmlentities($_POST['quantity_1']);
		       echo "</td><td>";
		       echo (htmlentities($_POST['quantity_1'])*$servings);
		       echo "</td><td>";
		       echo $stock_1;
		       echo "</td><td>";
				if((htmlentities($_POST['quantity_1'])*$servings)>$stock_1){
				      echo "$name_1 <label class=\"low\"> Not sufficient </label> for <label class=\"low\">$servings </label> Serving(s)";
				      echo "</td><td>";
				      $suggested = floor($stock_1 /(htmlentities($_POST['quantity_1'])));
						if($suggested > 0){
						    echo"Available for <label class =\"low\">  $suggested </label> Serving(s)";
						    echo "</td><td>";
						    echo"<label class =\"low\"> <a class=\"formlink\" href=\"index.php\">Update</a></label> ";
						}else {
						   echo "Insufficient Stock";
						   echo "</td><td>";
						   echo"<label class =\"low\"> <a class=\"formlink\" href=\"manage_stock.php?id=$item_1\">Update</a></label> ";
						}
				}else{
				      echo "$name_1  Sufficient for $servings Serving(s)";
				}
		     echo "</td></tr>";
		//
		       echo "<tr><td>";
		       echo $name_2;
		       echo "</td><td>";
		       echo htmlentities($_POST['quantity_2']);
		       echo "</td><td>";
		       echo (htmlentities($_POST['quantity_2'])*$servings);
		       echo "</td><td>";
		       echo $stock_2;
		       echo "</td><td>";
				if((htmlentities($_POST['quantity_2'])*$servings)>$stock_2){
				      echo "$name_2 <label class=\"low\"> Not sufficient</label> for </label><label class=\"low\">$servings </label> Serving(s)";
				      echo "</td><td>";
				      $suggested = floor($stock_2 /(htmlentities($_POST['quantity_2'])));
						if($suggested > 0){
						    echo"Available for <label class =\"low\">  $suggested </label> Serving(s)";
						    echo "</td><td>";
						    echo"<label class =\"low\"> <a class=\"formlink\" href=\"index.php\">Update</a></label> ";
						}else {
						   echo "Insufficient Stock";
						   echo "</td><td>";
						   echo"<label class =\"low\"> <a class=\"formlink\" href=\"manage_stock.php?id=$item_2\">Update</a></label> ";
						}
				}else{
				      echo "$name_2  Sufficient for $servings Serving(s)";
				}
		     echo "</td></tr>";
		//}
		//if((htmlentities($_POST['quantity_3'])*$servings)>$stock){
		  //     echo "<th>Suggestions</th></tr>";}
		       echo "<tr><td>";
		       echo $name_3;
		       echo "</td><td>";
		       echo htmlentities($_POST['quantity_3']);
		       echo "</td><td>";
		       echo (htmlentities($_POST['quantity_3'])*$servings);
		       echo "</td><td>";
		       echo $stock_3;
		       echo "</td><td>";
				if((htmlentities($_POST['quantity_3'])*$servings)>$stock_3){
				      echo "$name_3 <label class=\"low\"> Not sufficient </label> for <label class=\"low\">$servings </label>  Serving(s)";
				      echo "</td><td>";
				      $suggested = floor($stock_3 /(htmlentities($_POST['quantity_3'])));
						if($suggested > 0){
						    echo"Available for <label class =\"low\">  $suggested </label> Serving(s)";
						    echo "</td><td>";
						    echo"<label class =\"low\"> <a class=\"formlink\" href=\"index.php\">Update</a></label> ";
						}else {
						   echo "Insufficient Stock";
						   echo "</td><td>";
						   echo"<label class =\"low\"> <a class=\"formlink\" href=\"manage_stock.php?id=$item_3\">Update</a></label> ";
						}
				}else{
				      echo "$name_3  Sufficient for $servings Serving(s)";
				}
		     echo "</td></tr>";
		//if((htmlentities($_POST['quantity_4'])*$servings)>$stock){
		 //      echo "<th>Suggestions</th></tr>";}
		       echo "<tr><td>";
		       echo $name_4;
		       echo "</td><td>";
		       echo htmlentities($_POST['quantity_4']);
		       echo "</td><td>";
		       echo (htmlentities($_POST['quantity_4'])*$servings);
		       echo "</td><td>";
		       echo $stock_4;
		       echo "</td><td>";
				if((htmlentities($_POST['quantity_4'])*$servings)>$stock_4){
				      echo "$name_4 <label class=\"low\"> Not sufficient </label> for <label class=\"low\">$servings </label> Serving(s)";
				      echo "</td><td>";
				      $suggested = floor($stock_4/(htmlentities($_POST['quantity_4'])));
						if($suggested > 0){
						    echo"Available for <label class =\"low\">  $suggested </label> Serving(s)";
						    echo "</td><td>";
						    echo"<label class =\"low\"> <a class=\"formlink\" href=\"index.php\">Update</a></label> ";
						}else {
						   echo "Insufficient Stock";
						   echo "</td><td>";
						   echo"<label class =\"low\"> <a class=\"formlink\" href=\"manage_stock.php?id=$item_4\">Update</a></label> ";
						}
				}else{
				      echo "$name_4  Sufficient for $servings Serving(s)";
				}
		     echo "</td></tr>";
		echo "</table>";
		echo "</div>";
}
?>
<!------ content area stats here----->
<form action="rcp_plane.php" method="post" id="add_course">
                <div><p><h3> Check Stock Availability for  Meal Courses</h3></div>
                <div class="small_inst"> This is the place where you can manage your stock before its too late.</div>
		<div class="small_inst"> Quantity must be in grams/litters.</p></div>
                <div>
                    <label   for="serving" id="serving_id">No of Servings<span class= "req" > * </span> </label>
                    <select id="servings" name="servings" >
				<?php for($servings=1; $servings <= 12; $servings++){ ?>
                        <option value=" <?php  echo $servings;?>">
			<?php  echo $servings;?></option>
			<?php }?>
                        </select>
                </div>
                <div >
                <fieldset><div><span class="small_inst">Minimum four Ingredients Required </span></div>
                    <legend>Recipe Ingredients</legend>
                    <select id="id_1" name="course_1" >
        <?php
        $sql = $dbh->prepare("SELECT * FROM `ingredients` ");
				$sql->execute();
				while($row=$sql->fetch()){?>
				<option value="<?php echo $row['id'];?>"><?php  echo $row ['ingredient_name'];?></option>
				<?php }?>
                                </select>
                    <input type="text"  class="ingredient" name="quantity_1" size="16"/>
                    <span class="small">g/ml</span></label>

                    <select id="id_2" name="course_2" >
        <?php
        $sql = $dbh->prepare("SELECT * FROM `ingredients` ");
				$sql->execute();
				while($row= $sql->fetch()){
                    ?>
				<option value="<?php echo $row['id'];?>"><?php  echo $row ['ingredient_name'];?></option>
				<?php }?>
                                </select>
                    <input type="text"  class="ingredient" name="quantity_2" size="16"/>
                    <span class="small">g/ml</span>

                    <select id="id_3" name="course_3" >
        <?php
        $sql = $dbh->prepare("SELECT * FROM `ingredients` ");
				$sql->execute();
				while($row= $sql->fetch()){
                    ?>
				<option value="<?php echo $row['id'];?>"><?php  echo $row ['ingredient_name'];?></option>
				<?php }?>
                                </select>
                    <input type="text" class="ingredient" name="quantity_3" size="16"/>
                    <span class="small">g/ml</span>
                    <select id="id_4" name="course_4" >
        <?php
        $sql = $dbh->prepare("SELECT * FROM `ingredients` ");
					$sql->execute();
				while($row= $sql->fetch()){
                    ?>
				<option value="<?php echo $row['id'];?>"><?php  echo $row ['ingredient_name'];?></option>
				<?php }?>
                                </select>
                    <input type="text" class="ingredient" name="quantity_4" size="16"/>
                    <span class="small">g/ml</span>
                </fieldset></div>
		<div class=" actions button">
		<input type="submit" class="searchsubmit formbutton" name="submit" value="Calculate" />
		<input type="reset" class="searchsubmit formbutton" name="reset" value="Reset" />
		</div>
</form>
<div>
<!-- donot remove this div it start from sidebar --->
	    </div>
<!----  sidebar div Ends here  ----->
<!------ content area sends here  ----->
<?php include("includes/staff_sidebar.php"); ?>
<?php include("includes/footer.php"); ?>
