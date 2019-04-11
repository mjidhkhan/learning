<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if (isset($_POST['submit'])){
	$errors = array();
	// Form Validation
	$required_fields = array('course_name', 'course_type', 'meal_cat_id');
	foreach($required_fields as $fieldname) {
		if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname] != 0))  {
			$errors[] = $fieldname;
		}
	}
	if (!empty($errors)) {
		redirect_to("new_dish.php");
	}
        //fetching ingredients id's from user input
        $item_1 = htmlentities($_POST['course_1']);
        $item_2 = htmlentities($_POST['course_2']);
        $item_3 = htmlentities($_POST['course_3']);
        $item_4 = htmlentities($_POST['course_4']);
        //fetching ingredients quantities from user input
	$qty_1 = htmlentities($_POST['quantity_1']);
        $qty_2 = htmlentities($_POST['quantity_2']);
        $qty_3 = htmlentities($_POST['quantity_3']);
        $qty_4 = htmlentities($_POST['quantity_4']);
        //fetching user input for meal_course prepration
	$course_name = htmlentities($_POST['course_name']);
	$prep_date   = htmlentities($_POST['prep_date']);
	$course_type = htmlentities($_POST['course_type']);
	$time_to_prepare  = htmlentities($_POST['time_to_prepare']);
	$course_notes  = htmlentities($_POST['course_notes']);
	$course_instructions  = htmlentities($_POST['course_instructions']);
	$meal_cat_id = htmlentities($_POST['meal_cat_id']);
        // inserting data to meal_course table
	$query = "INSERT INTO meal_course (
				course_name, prep_date , course_type ,
				time_to_prepare, course_notes ,course_instructions ,
				meal_cat_id
			) VALUES (
				'{$course_name}', '{$prep_date}',
				{$course_type},{$time_to_prepare}, '{$course_notes}',
				'{$course_instructions}',{$meal_cat_id}
			)";
	$result = mysql_query($query, $connection);
        /* Recipes table Update  start here */
	if ($result) { //if meal_course INSERTION successfull then update recipie table 
            $sql = "SELECT id
                    FROM meal_course
                    ORDER BY id
                    DESC LIMIT 1";
            $result = mysql_query($sql);
            /*while($row = mysql_fetch_array($result)){
                    $course_id = $row['id'];}
            $query = "INSERT INTO recipes (
                            item_id, cours_id , qty_used 
                        ) VALUES 
                            ('{$item_1}', '{$course_id}','{$qty_1}'),
                            ('{$item_2}', '{$course_id}','{$qty_2}'), 
                            ('{$item_3}', '{$course_id}','{$qty_3}'), 
                            ('{$item_4}', '{$course_id}','{$qty_4}')";*/
            while($row = mysql_fetch_array($result)){
                    $course_id = $row['id'];}
            $query = "INSERT INTO recipes ( ";
            $query .= "item_id, cours_id , qty_used ";
                        $query .=") VALUES ";
                        if(($qty_1)!= null){$query .="('{$item_1}', '{$course_id}','{$qty_1}'), ";}
                        if(($qty_2)!= null){$query .="('{$item_2}', '{$course_id}','{$qty_2}'), ";}
                        if(($qty_3)!= null){$query .="('{$item_3}', '{$course_id}','{$qty_3}'), ";}
                        if(($qty_4)!= null){$query .="('{$item_4}', '{$course_id}','{$qty_4}') ";}
            $result = mysql_query($query, $connection);
            /* Recipes table update ends here*/
            /* Ingredients quantities Update start here*/
            if ($result) {
                /*if recipes table successfull then  we SELECT all ingredients id's
                 and UPDATE their quantities by their ID's
                */
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
                            /* Ingredients quantities update ends here*/
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
                            redirect_to("error_index.php");
                        }
    } else {
                                // if UPDATE failed then we Display error message.
                                echo "<p> Meal course  creation failed.</p>";
                                echo "<p>" . mysql_error() . "</p>";
    }
}
        //
    mysql_close($connection);
?>