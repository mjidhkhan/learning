<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
    if (logged_in()) {
		redirect_to("index.php");
	}
        if (isset($_POST['submit'])) { // Form has been submitted
                $username = htmlentities($_POST['username']);
		        $password = htmlentities($_POST['password']);
            $hashed_password = sha1($password);

                    // check all fields are filled in.
                    if($username  && $password){

                        $sql= $dbh->prepare("SELECT * FROM users
                                             WHERE username = :username
                                             AND  hashed_password = :hashed_password") ;
                             $sql->execute(array(':username'=> $username,
                                                 ':hashed_password'=> $hashed_password));
                             $count= $sql->rowCount();
                            if($count!=0){
                                while($row = $sql->fetch())
                                {
                                    // if user is staff redirect to staff index
                                    $row['status'];

                                    if ($row['status'] == 1)
                                    {
                                        // $found_user = mysql_fetch_array($result);
                                        $_SESSION['user_id'] = $row['id'];
                                        $_SESSION['status'] = $row['status'];
                                        $_SESSION['username'] = $row['username'];

                                        redirect_to("index_staff.php");
                                    }
                                    if ($row['status'] == 2)
                                    {
                                        //$found_user = mysql_fetch_array($result);
                                        $_SESSION['user_id'] = $row['id'];
                                        $_SESSION['status'] = $row['status'];
                                        $_SESSION['username'] = $row['username'];
                                        redirect_to("index_cust.php");
                                    }
                                }
                                }else{
                                $message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
                            }
                    }else{
                        $message= "Please fill in all fields.";
                        //fields input validation ends.
                    }
	} else { // Form has not been submitted.
	    $username = "";
	    $password = "";
        }
?>
<?php include("includes/header.php"); ?>
	<!------ content area stats here            ----->
	<table >
            <tr>
		<td>
		    <h3>Login Area</h3>
                    <?php if (!empty($message)){ echo "<p class=\"message\">" . $message . "</p>";} ?>
		    <form action="user_login.php" method="post">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" maxlength="30" value="<?php echo $username; ?>" /></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" maxlength="30" value="<?php echo $password; ?>" /></td>
				</tr>
				<tr>
                                        <td></td>
					<td colspan="2"><input type="submit" class="formbutton" name="submit" value="Login" /></td>
				</tr>
			</table>
		    </form>
		</td>
            </tr>
        </table>
	<!------ content area sends here            ----->
         <?php include("includes/sidebar.php"); ?>
	<?php include("includes/footer.php"); ?>
