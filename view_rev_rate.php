<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>


	<!------ content area stats here            ----->
<?php  if (logged_in()){?>
        <h3> Welcome,  <?php echo $user = strtoupper($_SESSION['username']);?> </h3>
<?php }else{?>
        <h3>Reviews to our Meals by  customers
<?php } ?>
        </h3><hr>
<?php //this query will show all  reviews by customers for specific products.
		$sql = $dbh->prepare("SELECT contents.id,
                                contents.title,
                                review_rating.review,
                                review_rating.user_id,
                                review_rating.date,
                                review_rating.rating,
                                review_rating.cont_title,
                                users.fullname
                        FROM contents
                        LEFT join review_rating
                        ON contents.id = review_rating.Cont_id
                        LEFT JOIN users
                        ON review_rating.user_id = users.id
                        ORDER BY review_rating.date ");
		$sql->execute();

?>
         <div class= "cust-reviews">
                <?php while($row= $sql->fetch()){?>
                    <ul>
                        <li>
                            <p>
                                <p> <h3>Meal <?php echo $row['title'] ;?></h3></p>
                                <h3><strong> <?php echo $row['fullname'] ;?> </Strong></h3></p>
                            <p> <?php echo $row['date'] ;?></p>
                            <p>  Rated: <?php
                                            if($row['rating'] == 1){
                                                echo '<img src="images/1star.gif"/> ' ;}
                                            if($row['rating'] == 2){
                                                echo '<img src="images/2star.gif"/>' ;}
                                            if($row['rating'] == 3){
                                                echo '<img src="images/3star.gif"/>' ;}
                                            if($row['rating'] == 4){
                                                echo '<img src="images/4star.gif"/>' ;}
                                            if($row['rating'] == 5){
                                                echo '<img src="images/5star.gif"/>' ;}
                                            if($row['rating'] == null){
                                                    echo '<p class ="star-rate"> This Porducted is not reviewed or rated. ';
                                                }
                                        ?>

                            </p>



                            <p> <h3> <?php echo $row['cont_title'] ;?></h3></p>
                            <p> <?php echo $row['review'] ;?> </p>
                        </li>
                    </ul>
                <?php } ?>


                </div>


        <div>
        </div>
	<!------ content area sends here            ----->
        <?php  include("includes/sidebar.php");?>
	<?php include("includes/footer.php"); ?>
