<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	
	
    $query=$dbh->prepare("SELECT * FROM users WHERE username =:username ");
	$query->execute(array(':username'=>$_SESSION['username']));
	//$result = mysql_query($query);
	while ($row = $query->fetch()){
			$fullname= $row['fullname'];
			
	    }
	    
    $sql=$dbh->prepare(" SELECT * FROM orders where customer_id =:customer_id ");
		$sql->execute(array(':customer_id'=>$_SESSION['user_id']));
		$result = $sql->fetchAll();

		print_r($_SESSION);
?>
<?php include("includes/header.php"); ?>
	<!------ content area stats here            ----->
<div id="content-head"><h3>Order details</h3></div>
    <div id="content">
	<form action="order_info.php" method="post">
	    <table>
		<tr>
		    <?php while ($row = mysql_fetch_array(mysql_query($sql))){ ?>
		    <td>Customer name: </td>
		  <td> <?php echo $row['customer_name'];
		} ?></td>
		    
		</tr>
		<tr>
		    <td></td>
		</tr>
	    </table>
	</form>
    </div>
	<!------ content area sends here            ----->	
         <?php include("includes/sidebar.php"); ?>       
	<?php include("includes/footer.php"); ?>
	
	
        
