<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>


<div id="content-head"><h3>Our Food</h3> </div>
    <div id="content">
        <div class="page">
        <div class="contents">
               <h2 class="food-title"> Main Courses</h2>
	<!------ content area stats here            ----->
        <?php  if (logged_in()){?>
        <h3> Hi,  <?php echo strtoupper($_SESSION['username']);?> Special food for your special event </h3>
        <?php }else{?>
            <h3>All available Main Courses
        <?php } ?></h3><hr>
	<?php //this query will show all available courses
		$sql =  $dbh->prepare("SELECT * FROM `contents`
                Where visible = 1
                AND m_type_id = 2");
		$sql->execute();
        ?>
	<?php while($row= $sql->fetch()){ ?>
                <h3><?php echo $row['title']; ?></h3>
                <p class="contents"><?php echo $row['content']; ?></p>
                <hr>
        <?php }?>
        </div>
        </div>
                        
</div>
	<!------ content area sends here            ----->
        <?php  include("includes/sidebar.php");?>
	<?php include("includes/footer.php"); ?>
