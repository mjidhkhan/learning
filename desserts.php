<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

	<!--  content area stats here            ----->
        <?php  if (logged_in()){?>
        <h3> Hi,  <?php echo strtoupper($_SESSION['username']);?> Sweet moments with our Special Dessert Choices </h3>
        <?php }else{?>
            <h3>All available Desserts
        <?php } ?></h3><hr>
	<?php //this query will show all available desserts
		$sql =  $dbh->prepare("SELECT * FROM `contents`
                Where visible = 1
                AND m_type_id = 3");
		$sql->execute();
        ?>
	<?php while($row= $sql->fetch()){ ?>
                <h3><?php echo $row['title']; ?></h3>
                <p class="contents"><?php echo $row['content']; ?></p>
                <hr>
        <?php }?>
	<!-- content area sends here            ----->
        <?php  include("includes/sidebar.php");?>
	<?php include("includes/footer.php"); ?>
