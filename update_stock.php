<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if (isset($_POST['submit'])){
	//fetching ingredients id's from user input
	$ing_1 = $_POST['ing_1'];
	$new_qty = htmlentities($_POST['quantity_2']);
	$query = $dbh->prepare("UPDATE ingredients SET 
		      quantity =:quantity {$new_qty} 
		WHERE id =:id {$ing_1}");
		if($sql->execute(array(':quantity'=>$new_qty, ':id'=>$ing_1))){
		      redirect_to("rcp_plane.php");
		} else {
		      // Failed
		    echo "stock update failed.";
		    echo mysql_error();
		}
}
?>
<?php include("includes/header.php"); ?>
<!------ content area stats here----->
<!-- donot remove this div it start from sidebar --->
	    </div>
<!----  sidebar div Ends here  ----->
<!------ content area sends here  ----->	
<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>