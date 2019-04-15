<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php confirm_logged_in(); ?>
<?php  include("includes/header.php"); ?>
</head>
	<!-- ---- content area stats here            ----->
        <h3> Create contents</h3>    
        <form method="post" action="add_content.php" enctype="multipart/form-data">
            <table>
	    <tr>
                <td><strong>Title:</strong><span class= "req" > * </span></td>
                <td><input type="text" name="title" value="" id="title" size="50" /></td>
            </tr>
            <tr>
                <td><strong>Visible:</strong><span class= "req" > * </span></td>
                <td><input type="radio" name="visible" value="0"/> No
			&nbsp;
			<input type="radio" name="visible" value="1"/> Yes
                </td>
	    </tr>
	    <tr>
                <td><strong>Category:</strong><span class= "req" > * </span></td>
                <td><input type="radio" name="m_cat_id" value="1"/> Vegetarian
			&nbsp;
			<input type="radio" name="m_cat_id" value="2"/> None-Vegetarian
                </td>
	    </tr>
	    <tr>
		<td><strong>Meal Type</strong> <span class= "req" > * </span> </td>
                <td><select id="m_type_id" name="m_type_id" >
                        <?php
                        $sql = $dbh->prepare("SELECT * FROM `meal_category` ");
                        $sql->execute();
                        while($row= $sql->fetch()){
                        ?>
                        <option value="<?php echo $row['id'];?>"><?php  echo $row ['meal_category'];?></option>
                        <?php }?>
                        </select>
		</td>
			</tr>
			<tr>
                <!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
                <td><strong >Upload Image</strong><span class= "req" > * </span></td>
                <td>
					<h3>Upload Recipe Image</h3>
					<input id="fileToUpload" class="form-control" type="file" name="fileToUpload" required >
                </td>
			</tr>
			
	    	<tr>
                <!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
                <td><strong>Content</strong><span class= "req" > * </span></td>
                <td><textarea id="elm1" name="elm1" rows="5" cols="80" style=" width: 100%"></textarea>
                </td>
			</tr>
	    	
			
			
	    <tr>
                <td></td>
                <td><input type="submit"  class="searchsubmit formbutton"  name="submit" value="Submit" />
                <input type="reset" class="searchsubmit formbutton" name="reset" value="Reset" /></td>
            </tr>
            </table>
        </form>
        
	
       
	<!------ content area sends here            ----->	
        <?php  if( $_SESSION['status']== 1){
                include("includes/staff_sidebar.php");
        }else{
            include("includes/sidebar.php");
        }
        ?>       
	<?php include("includes/footer.php"); ?>
        
