<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if (isset($_POST['submit'])){
	//fetching ingredients id's from user input
	$title 	= $_POST['title'];
	$visible = $_POST['visible'];
	$m_cat_id = $_POST['m_cat_id'];
	$m_type_id = $_POST['m_type_id'];
	$elm1	= $_POST['elm1'];
	$query 	=$dbh->prepare( "INSERT INTO contents(
		         title, visible, m_cat_id, m_type_id, content
		  )VALUES(':title, :visible, :m_cat_id,:m_type_id, :elm1')");
		$query->execute(array(':title'=>$title, ':visible'=> $visible, ':m_cat_id'=>$m_cat_id, ':m_type_id'=>$m_type_id, ':elm1'=>$elm1));
		      if ($query->rowCount() == 1) {
		      // Success
		      redirect_to("meals.php");
		      } else {
		      // Failed
		    redirect_to("new_content.php");
		}
}
?>
<?php include("includes/header.php"); ?>
<!-- content area stats here -->
<!-- donot remove this div it start from sidebar -->
	    </div>
<!--  sidebar div Ends here  -->
<!-- content area sends here  -->
<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>
