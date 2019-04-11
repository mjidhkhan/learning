<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in();  ?>

<?php include("includes/header.php"); ?>

	<!--  ---- content area stats here            ---  -->
        <?php  if (logged_in()){?>
        <h3> Welcome,  <?php echo strtoupper($_SESSION['username']);}?> </h3>
	<?php //this query will show all available courses
		$sql = $dbh->prepare("SELECT * FROM `contents` Where visible = 1");
		$sql->execute();
        ?>
	<?php while($row= $sql->fetch()){ ?>
                <h3><?php echo $row['title']; ?></h3>
                <p class="contents"><?php echo $row['content']; ?></p>
                <hr>
        <?php }?>
	<!--  ---- content area sends here            ---  -->
        <?php  include("includes/sidebar.php");?>
<?php  include("includes/special.php");?>
	<?php include("includes/footer.php"); ?>
