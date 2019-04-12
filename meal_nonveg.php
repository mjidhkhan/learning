<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

	<!-- content area stats here           -->
        <?php  if (logged_in()){?>
        <h3> Welcome,  <?php echo strtoupper($_SESSION['username']);?>,  Our Delicious Non-vegetarian Meals for You<hr> <?php }?></h3>
        <?php //this query will show all available courses
		$sql =  $dbh->prepare("SELECT * FROM `contents` Where m_cat_id = 1 ");
		$sql->execute();
            while($row= $sql->fetch() ){ ?>
                <h3>Meal:   <?php echo $row['title'];?> </h3>
                <h3>Type:
                  <?php
                    if($row['m_type_id']== 1){ echo "Starter";}
                    if($row['m_type_id']== 2){ echo "Main Course";}
                    if($row['m_type_id']== 3){ echo "Desserts";}
                    if($row['m_type_id']== 4){ echo "Breakfast";}
                    if($row['m_type_id']== 5){ echo "Refreshment";}
                  ?>
                </h3>
                <p class="contents"><?php echo $row['content']; ?></p>

                <p class="posted"><a href="reviews.php?id=<?php echo $cont_id=$row['id'];?>">Rate & Review</a> </p>
                <p class="reviews"> Customers Reviews</p>
                <?php //this query will show all available reviews for specific course
		$sql_1 =  $dbh->prepare("SELECT contents.id,
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
                        where contents.id = :cont_id
                        ORDER BY review_rating.rating ");
		$sql_1->execute(array(':cont_id'=>$cont_id));
?>

                <div class= "comments">
                <?php while($row_1= $sql_1->fetch()){?>
                    <ul>
                        <li>
                            <p> <h3><strong> <?php echo $row_1['fullname'] ;?> </Strong></h3></p>
                            <p> <?php echo $row_1['date'] ;?></p>
                            <p>  Rated: <?php
                                            if($row_1['rating'] == 1){
                                                echo '<img style="width:inherit; height:inherit" src="images/1star.gif"/> ' ;}
                                            if($row_1['rating'] == 2){
                                                echo '<img style="width:inherit; height:inherit" src="images/2star.gif"/>' ;}
                                            if($row_1['rating'] == 3){
                                                echo '<img style="width:inherit; height:inherit" src="images/3star.gif"/>' ;}
                                            if($row_1['rating'] == 4){
                                                echo '<img style="width:inherit; height:inherit" src="images/4star.gif"/>' ;}
                                            if($row_1['rating'] == 5){
                                                echo '<img style="width:inherit; height:inherit" src="images/5star.gif"/>' ;}
                                            if($row_1['rating'] == null){
                                                    echo '<p class ="star-rate"> This Porducted is not reviewed or rated. ';
                                                }
                                        ?>
                            </p>
                            <p> <h3> <?php echo $row_1['cont_title'] ;?></h3></p>
                            <p> <?php echo $row_1['review'] ;?> </p>
                        </li>
                    </ul>
                <?php } ?>

                <div class="clear"></div>
                </div>
         <?php }?>

        <div>
        </div>

	<!-- content area sends here            -->
        <?php  include("includes/sidebar.php");?>
	<?php include("includes/footer.php"); ?>
