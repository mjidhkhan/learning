<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php


function fileUpload($fileName, $sourcePath, $targetPath, $fileType)
    {

        $valid_extensions = array('jpeg', 'jpg', 'png');
        $temporary = explode('.', $fileName);
        $file_extension = end($temporary);
        if ((($fileType == 'image/png') || ($fileType == 'image/jpg') || ($fileType == 'image/jpeg')) && in_array($file_extension, $valid_extensions)) {
            if (move_uploaded_file($sourcePath, $targetPath)) {
                $uploadedFile = $fileName;
            }
        }
    }
if (isset($_POST['submit'])){

        if (!empty($_FILES['fileToUpload']['type'])) {
		$fileName = time().'_'.$_FILES['fileToUpload']['name'];
		$sourcePath = $_FILES['fileToUpload']['tmp_name'];
		$targetPath = 'upload/recipe-images/'.$fileName;
		$fileType = $_FILES['fileToUpload']['type'];
		fileUpload($fileName, $sourcePath, $targetPath, $fileType);
	
	} 

	$errors = array();
	// Form Validation
	$required_fields = array('course_name', 'course_type', 'meal_type');
	foreach($required_fields as $fieldname) {
		if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname] != 0))  {
			$errors[] = $fieldname;
		}
	}
	if (!empty($errors)) {
		redirect_to("new_dish.php");
	}
        //fetching ingredients id's from user input
      /* $item_1 = htmlentities($_POST['course_1']);
        $item_2 = htmlentities($_POST['course_2']);
        $item_3 = htmlentities($_POST['course_3']);
        $item_4 = htmlentities($_POST['course_4']);
        //fetching ingredients quantities from user input
	$qty_1 = htmlentities($_POST['quantity_1']);
        $qty_2 = htmlentities($_POST['quantity_2']);
        $qty_3 = htmlentities($_POST['quantity_3']);
        $qty_4 = htmlentities($_POST['quantity_4']);
        */

        //fetching user input for meal_course prepration
	$course_name = htmlentities($_POST['course_name']);
	$prep_date   = htmlentities($_POST['prep_date']);
	$course_type = htmlentities($_POST['course_type']);
	$time_to_prepare  = htmlentities($_POST['time_to_prepare']);
	$course_notes  = htmlentities($_POST['course_notes']);
	$course_instructions  = htmlentities($_POST['course_instructions']);
	$meal_type = htmlentities($_POST['meal_type']);
        // inserting data to meal_course table
	$query =  $dbh->prepare("INSERT INTO meal_course (course_type, meal_type) 
        VALUES  (:course_type, :meal_type)");
        $query->execute(array(':course_type'=>$course_type, ':meal_type'=>$meal_type));
        $course_id = $dbh->lastInsertId();
        if($course_id> 0){
		$sql = $dbh->prepare("INSERT INTO course_details ( course_id, course_name, course_prep_date, course_prep_time, course_notes, course_instructions, course_image)
								VALUES (:course_id, :course_name, :course_prep_date, :course_prep_time,
                                                                :course_notes, :course_instructions, :course_image)");
		$sql->execute(array(':course_id'=>$course_id, ':course_name'=>$course_name, ':course_prep_date'=>$prep_date, ':course_prep_time'=>$time_to_prepare,
                ':course_notes'=>$course_notes, ':course_instructions'=>$course_instructions, ':course_image'=>$fileName));
                // add ingredients details to recipe table

                // update stock




	}
        /* Recipes table Update  start here */
	if ($course_id> 0) { //if meal_course INSERTION successfull then update recipie table 
            $query = $dbh->prepare("INSERT INTO recipes ( course_id, item_id , qty_used ) VALUES(:course_id, :item_id, :qty_used)");          
         for($i=1; $i<=4; $i++){
               $item = htmlentities($_POST['item_'.$i]);;
               $qty_used = htmlentities($_POST['quantity_'.$i]);
               $query->execute(array(':course_id'=>$course_id, ':item_id'=>$item , ':qty_used'=>$qty_used));

               $select_item = $dbh->prepare("SELECT id quantity FROM `stock` WHERE id =:id ");
               $select_item->execute(array(':id'=> $item));

               $result= $select_item->fetch();
               $stock_qty = $result['quantity'];
               $new_qty= $stock_qty - $qty_used;

               $update_item = $dbh->prepare("UPDATE stock SET  quantity =:quantity WHERE id =:id");
               $update_item->execute(array(':id'=>$item, ':quantity'=>$new_qty));
               $updt_id = $dbh->lastInsertId();
               $stock_qty  = 0;
               $new_qty  = 0;
         }
         if ($course_id>0) {
                // on Successfull UPDATE we redirect to index page
                redirect_to("index_staff.php");
        }else{
                echo "<p> Recipe  creation failed.</p>";
        }
            
            /* Recipes table update ends here*/
            /* Ingredients quantities Update start here*/
            /*
            if ($result) {
                /*if recipes table successfull then  we SELECT all ingredients id's
                 and UPDATE their quantities by their ID's
                *
                $sql_1 = "SELECT id, quantity FROM `ingredients` WHERE id = $item_1 LIMIT 1 ";
                $result = mysql_query($sql_1);
                    while($row = mysql_fetch_array($result)){
                    $new_qty= ($quantity_1= $row['quantity'])-($qty_1);}
                    $query = "UPDATE ingredients SET 
                                    quantity = {$new_qty}
                                    WHERE id = {$item_1}";
                            $result = mysql_query($query);
                    $sql_1 = "SELECT id, quantity FROM `ingredients` WHERE id = $item_2 LIMIT 1 ";
                    $result = mysql_query($sql_1);
                    while($row = mysql_fetch_array($result)){
                    $new_qty= ($quantity_2= $row['quantity'])-($qty_2);}
                            $query = "UPDATE ingredients SET 
                                            quantity = {$new_qty}
                                            WHERE id = {$item_2}";
                            $result = mysql_query($query);
                    $sql_1 = "SELECT id, quantity FROM `ingredients` WHERE id = $item_3 LIMIT 1 ";
                    $result = mysql_query($sql_1);
                    while($row = mysql_fetch_array($result)){
                    $new_qty= ($quantity_3= $row['quantity'])-($qty_3);}
                            $query = "UPDATE ingredients SET 
                                            quantity = {$new_qty}
                                            WHERE id = {$item_3}";
                            $result = mysql_query($query);
                    $sql_1 = "SELECT id, quantity FROM `ingredients` WHERE id = $item_4 LIMIT 1 ";
                    $result = mysql_query($sql_1);
                    while($row = mysql_fetch_array($result)){
			$new_qty = ($quantity_4= $row['quantity'])-($qty_4);}
                            $query = "UPDATE ingredients SET 
                                            quantity = {$new_qty}
                                            WHERE id = {$item_4}";
                            $result = mysql_query($query);
                            /* Ingredients quantities update ends here
                            if ($result) {
                                // on Successfull UPDATE we redirect to index page
                                redirect_to("index_staff.php");
                        }else{
                            echo "<p> Recipe  creation failed.</p>";
                        }
            }
            
        if ($result) {
                                // on Successfull UPDATE we redirect to index page
                                redirect_to("index_staff.php");
        }else{
                            //redirect_to("error_index.php");
        }
        */
    } else {
                                // if UPDATE failed then we Display error message.                          echo "<p> Meal course  creation failed.</p>";
                                echo "<p>" . mysql_error() . "</p>";
    }
}
        //
    mysql_close($connection);
?>