<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if (isset($_POST['submit'])) { // Form has been submitted
                $username = trim($_POST['username']);
                $fullname = trim($_POST['fullname']);
		$password = trim($_POST['password']);
                $repeatpassword = trim($_POST['repeatpassword']);
                $email    = trim($_POST['email']);
                $status   = 2;
                    // check all fields are filled in.
                    if($username && $fullname && $password && $repeatpassword && $email){
                        //validation for password and repeat password 
                        if($password == $repeatpassword){
                            //Fullname and username length validation
                            if(strlen($fullname)>25 || strlen($username)>25){
                                $message = "Fullname or Username is too long";
                                //Length validation ends
                            }else{
                                // Password length validation password between 6 to 25 characters
                                if(strlen($password)>25 || strlen($password)<6){
                                    $message = "Password must be between 6 to 25 characters";
                                }else{
                                    $hashed_password = sha1($password);
                                    $sql= $dbh->prepare("SELECT username FROM users
                                            WHERE username =:username ");
                                            $sql->execute(array(':username'=>$username));
                                        $result = $sql->rowCount();
                                       // $count= mysql_num_rows($result);
                                                if($result>0){
                                                    //user exist
                                                    $message = "The user with Name: $username already exist."; 
                                                }else{
                                                    //register
                                                    $sql = $dbh->prepare("INSERT INTO users (fullname, username,email, hashed_password, status) 
                                                            VALUES (:fullname, :username,:hashed_password, :status)");
                                                    if($sql->execute(array(':fullname'=>$fullname, ':username'=>$username,
                                                                    ':hashed_password'=>$hashed_password, ':status'=>$status))){
                                                        redirect_to("user_login.php");
                                                        $message = "The user was successfully created.";
                                                    } else {
                                                        $message =  "The user could not be created.";
                                                        $message .= "<br />" . mysql_error();
                                                    }
                                                }    
                                    }
                                }
                        }else{
                            $message="Password donot match";
                            //passwoed match validation ends.
                        }
                    }else{
                        $message= "Please fill in all fields.";
                        //fields input validation ends.
                    }
		
	} else { // Form has not been submitted.
		$username = "";
                $fullname ="";
                $email = "";
		$password = "";
                $repeatpassword = "";
        }
?>
<?php include("includes/header.php"); ?>
	<!------ content area stats here            ----->		
	<table >
            <tr>
		<td>
			<h3>Create Your Account </h3>
                        <?php if (!empty($message)){ echo "<p class=\"message\">" . $message . "</p>";} ?>
			<form action="new_cust.php" method="post">
			<table>
                                <tr>
					<td>Full name:</td>
					<td><input type="text" name="fullname" maxlength="30" value="<?php echo $fullname; ?>" /></td>
				</tr>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" maxlength="30" value="<?php echo $username; ?>" /></td>
				</tr>
                                <tr>
					<td>E-mail:</td>
					<td><input type="text" name="email" maxlength="30" value="<?php echo $email; ?>" /></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" maxlength="30" value="<?php echo $password; ?>" /></td>
				</tr>
                                <tr>
					<td>Confirm Password:</td>
					<td><input type="password" name="repeatpassword" maxlength="30" value="<?php echo $password; ?>" /></td>
				</tr>
				<tr>
                                        <td></td>
					<td colspan="2"><input type="submit" class="formbutton" name="submit" value="Create user" /></td>
				</tr>
			</table>
			</form>
		</td>
            </tr>
        </table>
	<!------ content area sends here            ----->	
         <?php include("includes/sidebar.php"); ?>       
	<?php include("includes/footer.php"); ?>
        
