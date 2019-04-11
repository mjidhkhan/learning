<?php
    require_once("includes/session.php");
    require_once("includes/connection.php");
    require_once("includes/functions.php");
    confirm_logged_in();

    if (isset($_POST['submit'])){
	// Perform Update
        $id = htmlentities($_POST['course_id']);
	$course_name = htmlentities($_POST['course_name']);
        $prep_date = htmlentities($_POST['prep_date']);
	$course_type = htmlentities($_POST['course_type']);
	$time_to_prepare  = htmlentities($_POST['time_to_prepare']);
	$course_notes  = htmlentities($_POST['course_notes']);
	$course_instructions  = htmlentities($_POST['course_instructions']);
	$meal_cat_id = htmlentities($_POST['meal_cat_id']);

		$query =$dbh->prepare( "UPDATE meal_course SET
                            course_name = :course_name,
                            course_type = :course_type,
                            time_to_prepare =:time_to_prepare,
                            course_notes = :course_notes,
                            course_instructions = :course_instructions,
                            meal_cat_id = :meal_cat_id
                        WHERE id = :id");
		$query->execute(array(':course_name'=>$course_name, ':course_type'=>$course_type,
                          ':time_to_prepare'=>$time_to_prepare, ':course_notes'=>$course_notes,
                          ':course_instructions'=>$course_instructions, ':meal_cat_id'=>$meal_cat_id,
                          ':id'=>$id ));
		if ($query->rowCount() == 1) {
			// Success
			redirect_to("staff_index.php");
		} else {
			// Failed
			echo "Course update failed. <br/>";
			echo   mysql_error();
		}
	} // end: if (isset($_POST['submit']))

$id = ($_GET['course_id']);
    $sql= $dbh->prepare("SELECT *
        FROM meal_course
        WHERE id = $id");
    $sql->execute();
    while($row = $sql->fetch()){;
        $course= $row['course_name'];
        $c_type= $row['course_type'];
        $m_type= $row['meal_cat_id'];
        $date = $row['prep_date'];
        $prep_time = $row['time_to_prepare'];
        $notes = $row['course_notes'];
        $instructions = $row['course_instructions'];
    }
 include("includes/header.php"); ?>
<!------ content area stats here            ----->

	<form action="manage_course.php" method="post" id="update_course">
		<div><h3> Update Meal Courses</h3>
		<p> <strong> All fields must be filled.</strong></p>
		<div>
                        <input type="hidden"  class="ingredient readonly" value=" <?php echo $id;?>"readonly='readonly' name="course_id" size="16"/>
			<label for="course_name" id="course_name">Course Name</label>
			<input name="course_name" id="course_name" size="50" type="text" value="<?php echo $course; ?>"/>

		</div>
		<div>
			<label>Course Type</label>
			<label class="secondary"><input type="radio" name="course_type" id="course_type "value="1"
			<?php if($c_type == 1) {echo "checked";}?> /> Vegetarian</label>
			<label class="secondary sec"> <input type="radio" name="course_type" id="course_type" value="2" <?php if($c_type == 2){ echo "checked";}?> />  None-Vegetarian</label>
		</div>
		<div>
			<label  class="required" for="meal_cat_id" id="meal_cat_id">Meal Type </label>
			<select id="meal_cat_id" name="meal_cat_id" class="required" title="Meal Type . This is a required field">
				<option value="1"
			        > Starter</option>
				<option value="2">Main course</option>
				<option value="3">Desserts</option>
				<option value="4">Breakfast</option>
				<option value="5">Refreshment</option>
			</select>
		</div>
                <div>
			<label for="prep_date" id="datepicker">Date</label>
			<input type= "text" name="prep_date" id="date" value="<?php echo $date;?>" />
		</div>
		<div >
			<label for="time_to_prepare" id="time_to_prepare">Preparation Time</label>
			<input name="time_to_prepare" id="time_to_prepare" size="14" type="text" value="<?php echo $prep_time;?>"/>
		</div>
		<div>
			<label for="course_notes" id="course_notes">Special notes </label>
			<textarea  name="course_notes" id="course_notes" cols="50" rows="10"><?php echo $notes;?> </textarea>
		</div>
		<div>
			<label for="course_instructions" id="course_instructions">Instructions </label>
			<textarea name="course_instructions" id="course_instructions" cols="50" rows="10"><?php echo $instructions; ?></textarea>
		</div>
		<div class=" actions button">
		<input type="submit" class="searchsubmit formbutton" name="submit" value="Submit" />
		</div>
	</form>
	<!-- donot remove this div it start from sidebar --->
		</div>
	<!----  sidebar div Ends here  ----->
	<!------ content area sends here            ----->

<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>
