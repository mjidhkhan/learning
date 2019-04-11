<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
if (isset($_POST['submit'])){
	//fetching ingredients id's from user input
	$ing_1 = $_POST['ing_1'];
	$old_qty = ($_POST['quantity_1']);
	//adding new quantity to old
	$new_qty = htmlentities($_POST['quantity_2']+($old_qty));
	//updating stock
	$query 	= $dbh->prepare("UPDATE ingredients SET quantity = :new_qty
													 WHERE id = :ing_one");
		$query->execute(array(':new_qty' => $new_qty, ':ing_one' => $ing_1));
		//$result = mysql_query($query);
		      if (	$query->rowCount() == 1) {
		      // if record updated we redirect to qty_view.php
		      redirect_to("qty_view.php?a=$ing_1&?b=$old_qty&");
		      } else {
		      // Failed
		     $message = "The subject update failed.";
		     $message .= "<br />". mysql_error();
		}
}
$ing_1 = $_GET['id'];
$sql = $dbh->prepare("SELECT * FROM `ingredients` WHERE id = $ing_1");
$sql->execute(array(':ing_1'=>$ing_1));
	while($row =$sql->fetch()){;
		$item_name = $row['ingredient_name'];
		$stock_qty= $row ['quantity'];}
?>
<?php include("includes/header.php"); ?>
<h3> Welcome , <?php echo $_SESSION['username'];?> </h3><p>
<!------ content area stats here----->
<form action="manage_stock.php" method="post" id="add_course">
                <div><h3> Update Stock  for <?php echo $item_name;?></h3></div>
                <div class="small_inst"> New quantity will be Add to Old quantity.</div>
		<div class="small_inst"> Quantity must be in grams/litters.</div>
		<div class="small_inst"> Units: 1kg = 1000 grams & 1 liter = 1000 ml.</p></div>
                <div >
                <fieldset><div>
                    <legend>Ingredient: <?php echo $item_name;?></legend>
		    <input type="hidden"  class="ingredient readonly" value=" <?php echo $ing_1;?>"readonly='readonly' name="ing_1" size="16"/>
		    <label class="readonly"> InStock Qyantity</label>
                    <input type="text"  class="ingredient readonly" value=" <?php echo $stock_qty;?>"readonly='readonly' name="quantity_1" size="16"/>
                    <span class="small">g/ml</span></label>
		    <label>Enter new Quantity</label>
                    <input type="text" class="ingredient" name="quantity_2" size="16"/>
                    <span class="small">g/ml</span>
                </fieldset></div>
		<div class=" actions button">
		<input type="submit" class="searchsubmit formbutton" name="submit" value="Update" />
		<input type="reset" class="searchsubmit formbutton" name="reset" value="Reset" />
		</div>
</form>
<div>
<!-- donot remove this div it start from sidebar --->
	    </div>
<!----  sidebar div Ends here  ----->
<!------ content area sends here  ----->
<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>
