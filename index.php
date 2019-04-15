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
        <hr>
	<?php while($row= $sql->fetch()){ ?>
                <h3 style="background-color:#eee; height:34px; padding:20px 0 0 20px"><?php echo $row['title']; ?></h3>
                <p><img  class="recipe-image" src="upload/recipe-images/<?php echo $row['recipe_image']; ?>"></p>
                <p class="contents"><?php echo $row['content']; ?></p>
                <br>
                <hr>
        <?php }?>
	<!--  ---- content area sends here            ---  -->
        <?php  include("includes/sidebar.php");?>

	<?php include("includes/footer.php"); ?>
