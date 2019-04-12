<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
	<!------ content area stats here            ----->
        <?php  if (logged_in() && $_SESSION['status']== 2){?>
            <h3> Welcome,  <?php echo $user = strtoupper($_SESSION['username']);?> to Rate & Review </h3>
	<?php //this query will show all available courses
		$sql =  $dbh->prepare("SELECT * FROM `contents`
                Where id =:id");
                $sql->execute(array(':id'=>$_GET['id']));
        while($row= $sql->fetch()){$title = $row['title']; }
                $sql_1= $dbh->prepare("SELECT *
                            FROM users 
                            WHERE username =:username");
                         $sql_1->execute(array(':username'=>$user));
                    while($row= $sql_1->fetch()){ 
        ?>
        <div class="reviews">
        <h3> <p class= "title"> Rating & Review</h3>
        
        <form method="post" action="add_rating.php">
            <table>
            <tr>
                <td class="cont ">Your Name:</td>
                <td><input type="text" class="readonly" readonly="true" name="username"  value="<?php echo strtoupper($row['fullname'])?>" id="username" size="50" /></td>
            </tr>
            <tr>
                <td class="cont">Product Name:</td>
                <td><input type="text"  readonly="true" class="readonly" name="title"  value="<?php echo $title;?>" id="title" size="50" /></td>
            </tr>
            <tr>
                <td class="cont">Rating:<span class= "req" > * </span></td>
                <td><div class="contents">
                            <input id="rating-1" name="rating" type="radio" value="1"/> Poor
                            <input id="rating-3" name="rating" type="radio" value="3"/> Fair
                            <input id="rating-5" name="rating" type="radio" value="5"/> Good
                            <input id="rating-3" name="rating" type="radio" value="3"/> Very Good
                            <input id="rating-5" name="rating" type="radio" value="5"/> Excellent
                    </div>
                </td>
            </tr>
            <tr>
                <td class="cont">Review Title:<span class= "req" > * </span></td>
                <td><input type="text" name="your_title" value="" id="title" size="50" /></td>
            </tr>
	    <tr>
                <td class="cont">Review<span class= "req" > * </span></td>
                <td><textarea id="review" name="review" rows="10" cols="60" style=" width: 80%"></textarea>
                </td>
            </tr>
	    <tr>
                <td></td>
                <td><input type="submit"  class="searchsubmit formbutton"  name="submit" value="Submit" />
                <input type="reset" class="searchsubmit formbutton" name="reset" value="Reset" /></td>
            </tr>
            </table>
        </form></p>
        <?php
        } 
                     ?>
        </div>
    <?php }else{?>
            <h3> Rate & Reviews </h3> <hr>
                <p class=" info"> Only our customers are allowed to rate and review our products <a href="meals.php">Go Back</a> </P>
       
        <?php }?>
     <div>
     </div>
	<!------ content area sends here            ----->	
        <?php  include("includes/sidebar.php");?>       
	<?php include("includes/footer.php"); ?>
        
