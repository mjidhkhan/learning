<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

	<!-- content area stats here            ----->
        <?php  if (logged_in()){?>
        <h3> Welcome,  <?php echo strtoupper($_SESSION['username']);?>,  Our Delicious Meals for You<hr> <?php }?></h3>
	<?php //this query will show all available courses
		$sql = $dbh->prepare("SELECT * FROM `contents`
                Where visible= 1");
		$sql->execute();
                //$row= mysql_fetch_array($result);?>
	<?php while($row= $sql->fetch()){ ?>
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['content']; ?></p>
                <hr>
        <?php }?>

	<!-- content area sends here            ----->
        <?php  if( $_SESSION['status']== 1){
                include("includes/staff_sidebar.php");
        }else{
            include("includes/sidebar.php");
        }
        ?>
	<?php include("includes/footer.php"); ?>
