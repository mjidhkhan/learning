<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>


<!------ content area stats here----->
<h3> Welcome , <?php echo $_SESSION['username'];?> </h3><p>
	<div><h3> Prepare Meal Courses</h3>
                <p class="small_inst"> <strong> All fields must be filled.</strong></p>
		<p class="link"> <a  href="rcp_plane.php">Check Stock Availability</a>
				</div>

	<form action="add_course.php" method="post" id="add_course"  enctype="multipart/form-data">
		<p>
		<div>
				<label>Meal Type <span class= "req" > * </span></label>
				<select id="meal_type" name="meal_type" >
				    <?php
				    $sql =$dbh->prepare( "SELECT * FROM `meal_type` ");
				      $sql->execute();
				    while($row= $sql->fetch()){
				    ?>
				    <option value="<?php echo $row['id'];?>"><?php  echo $row ['meal_type'];?></option>
				    <?php }?>
				</select>
			</div>
			<div>
				<label>Course Type <span class= "req" > * </span> </label>
				<select id="course_type" name="course_type" >
				    <?php
				    $sql =$dbh->prepare( "SELECT * FROM `course_type` ");
				      $sql->execute();
				    while($row= $sql->fetch()){
				    ?>
				    <option value="<?php echo $row['id'];?>"><?php  echo $row ['course_type'];?></option>
				    <?php }?>
				</select>
			</div>
			<div>
				<label>Course Name <span class= "req" > * </span></label>
				<input id="course_name" name="course_name" type="text" size="50"/><span class= "req" >
			</div>
			<div>
				<br>
				<label>Date <span class= "req" > * </span></label>
				<input type= "text" name="prep_date" id="date" size="13"/>
			</div>
			<fieldset>
				<div><span class="small_inst">Minimum four Ingredients Required </span></div>
				<legend>Recipe Ingredients</legend>
				<select id="id_1" name="item_1" >
				<?php $sql = $dbh->prepare("SELECT * FROM `stock` ");
					      $sql->execute();
					    while($row= $sql->fetch()){?>
					    <option value="<?php echo $row['id'];?>"><?php  echo $row ['ingredient_name'];?></option>
					    <?php }?>
					    </select>
				<input type="text"  class="ingredient" name="quantity_1" size="16"/>
				<span class="small">g/ml</span></label>

				<select id="id_2" name="item_2" >
				<?php $sql = $dbh->prepare("SELECT * FROM `stock` ");
					      $sql->execute();
					    while($row= $sql->fetch()){
				?>
					    <option value="<?php echo $row['id'];?>"><?php  echo $row ['ingredient_name'];?></option>
					    <?php }?>
				</select>
				<input type="text"  class="ingredient" name="quantity_2" size="16"/>
				<span class="small">g/ml</span>

				<select id="id_3" name="item_3" >
				<?php $sql = $dbh->prepare("SELECT * FROM `stock` ");
					      $sql->execute();
					    while($row= $sql->fetch()){
				?>
					    <option value="<?php echo $row['id'];?>"><?php  echo $row ['ingredient_name'];?></option>
					    <?php }?>
					    </select>
				<input type="text" class="ingredient" name="quantity_3" size="16"/>
				<span class="small">g/ml</span>

				<select id="id_4" name="item_4" >
				<?php $sql = $dbh->prepare("SELECT * FROM `stock` ");
					      $sql->execute();
					    while($row= $sql->fetch()){
				?>
					    <option value="<?php echo $row['id'];?>"><?php  echo $row ['ingredient_name'];?></option>
					    <?php }?>
					    </select>
				<input type="text" class="ingredient" name="quantity_4" size="16"/>
				<span class="small">g/ml</span>
			</fieldset>
											
			
			<div>
			</br>
				<label for="time_to_prepare" id="time_to_prepare">Prepare Time <span class= "req" > * </span></label>
				<input name="time_to_prepare" id="time_to_prepare" size="16" type="text"/>
				<span class="small">Minutes</span>
			</div>
			<div>
				<label for="course_notes" id="course_notes">Special notes <span class= "req" > * </span> </label>
				<textarea  name="course_notes" id="course_notes" cols="50" rows="5"></textarea>
			</div>
			<div>
				<label for="course_instructions" id="course_instructions">Instructions <span class= "req" > * </span> </label>
				<textarea name="course_instructions" id="course_instructions" cols="50" rows="5" ></textarea>
			</div>
			<div>
			</br>
				<fieldset>
				<legend>Upload Image</legend>
					<input id="fileToUpload" class="form-control" type="file" name="fileToUpload" required >
				</fieldset>       
			</div>
			<div class=" actions button">
				<input type="submit" class="searchsubmit formbutton" name="submit" value="Submit" />
				<input type="reset" class="searchsubmit formbutton" name="reset" value="Reset" />
			</div>
	</form>
	
	<div>
<!-- donot remove this div it start from sidebar --->
	    </div>
<!----  sidebar div Ends here  ----->
<!------ content area sends here  ----->
<?php include("includes/staff_sidebar.php"); ?>
<?php include("includes/footer.php"); ?>
