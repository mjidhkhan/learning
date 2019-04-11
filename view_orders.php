<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
    $user_name= $_SESSION['username'];
    $query="SELECT *
	     FROM users
	     WHERE username = '$user_name' ";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)){
	    $u_name= $row['fullname'];
	    }
	    
    $sql=" SELECT *
            FROM orders
	    where customer_name = '$u_name' ";
	    $result = mysql_query($sql);
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
	
	
        
