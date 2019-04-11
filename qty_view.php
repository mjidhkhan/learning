<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<h3> Welcome , <?php echo $_SESSION['username'];?> </h3><p>
	<!------ content area stats here            ----->		
	<?php
        /*this query will show Ingredients used in Recipe with Quantity used
         and Remaining quantity in Stock after Updating  Quantaties*/
	$ing_1 = $_GET['a'];
        $old_qty = $_GET['?b'];
        $sql = $dbh->prepare("SELECT * FROM `ingredients` WHERE id = :ing_one");
        $sql->execute(array(':ing_one'=>$ing_1));
        while($row = $sql->fetch()){
		    $item_name = $row['ingredient_name'];
		    $stock_qty  = $row ['quantity'];
            $units  =   $row['units'];}
?>
	<p><h3> <?php echo $item_name;?> Quantity Updated</h3></p>
	<table>
		<tr>
                   <th>Ingredients</th>
                   <th>Old quantity</th>
		   <th>New quantity</th>
                   <th>Units</th>
		</tr>
		<tr class="alt">
	
                  <td><?php echo $item_name; ?></td>
                  <td><?php echo $old_qty; ?></td>
		  <td><?php echo $stock_qty ?></td>
                   <td><?php echo $units; ?></td>
                </tr>
			
	</table>	
	<!------ content area sends here            ----->	

        <?php include("includes/staff_sidebar.php"); ?>       
	<?php include("includes/footer.php"); ?>
        
