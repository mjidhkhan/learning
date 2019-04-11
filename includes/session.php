<?php
session_start();
function logged_in() {
	return isset($_SESSION['username']) && ($_SESSION['status']);
}
function confirm_logged_in() {
	if (!logged_in()) {
	redirect_to("user_login.php");
	}
}
?>