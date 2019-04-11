<?php // this will use to redirect
function logged_index() {
    if($_SESSION=true){
	return isset($_SESSION['username']);
    }
}
function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
?>
