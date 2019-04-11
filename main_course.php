<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>


<!------ content area stats here            ---->

<div id="content-head"><h3>Our Food</h3> </div>
    <div id="content">
        <div class="page">
        <div class="contents">
               <h2 class="food-title"> Main Courses</h2>
               <p><a  href="#"><img class="hovergallery" src="meals/Collegiate-Meals-Toaster-Oven-Cornish-Hens.jpg" alt="starter"></a></p>
                    <p>Dollop about a quarter of the cream cheese in the centre of the salmon and
                   spread to the edge with the spatula or a palette knife; slowly turn the tin
                   to get an even thickness of about 3mm. Top this with a salmon layer, continuing
                   until both salmon and cheese have been used, finishing with a salmon layer.
                   Press the top down with your hands. Stretch cling film over and refrigerate
                   for at least four hours - or preferably overnight.
               </p>
               <p>
                    Make the dressing. Simmer the shallots, sugar and brandy in a small pan until
                   almost dry and a deep brown colour - about 5 minutes. Tip into a bowl and
                   leave to cool. Whisk the creme frasche in a bowl with the mustard and lime juice,
                   and whisk in the cold shallots.Whisk in the olive oil, trickling it slowly as
                   if making mayonnaise. Season, cover the bowl with cling film and chill in the
                   fridge for 2 hours or overnight.
               </p>

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
<!------ content area sends here            ---->	
<?php  include("includes/sidebar.php");?>
<?php  include("includes/special.php");?>
<?php include("includes/footer.php"); ?>
