<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>menu Planning</title>
		<link href="stylesheets/styles.css" media="all" rel="stylesheet" type="text/css" />
		<link href="stylesheets/form.css" media="all" rel="stylesheet" type="text/css" />
                <link rel="stylesheet" href="stylesheets/css/ui-lightness/jquery-ui-1.7.2.custom.css" type="text/css" media="screen" charset="utf-8"/>
                <link href='stylesheets/jquery.rating.css' type="text/css" rel="stylesheet"/>
                <link rel="stylesheet" href="stylesheets/stars.css" type="text/css" media="screen" charset="utf-8"/>
                <link rel="stylesheet" href="stylesheets/clander.css" type="text/css" media="screen" charset="utf-8"/>
                <script src="jscripts/lib/jquery-1.4.min.js" type="text/javascript" charset="utf-8"></script>
                <script src="jscripts/lib/jquery-ui-1.7.2.custom.min.js" type="text/javascript" charset="utf-8"></script>
                <script type="text/javascript" src="jscripts/script.js"></script>
                <script type="text/javascript" src="jscripts/sidebar.js"></script>
                <script type="text/javascript" src="jscripts/clander.js"></script>
	</head>		
<body>
<div id="container">
	<div id="header">
    	<h1><a href="index.php">menu<strong>Planing</strong></a></h1>
        <h2>Standardize Planning & Quality Service </h2>
        <div class="clear"></div>
    </div>
    <div id="nav">
    	<ul>
            <?php if (!logged_in()){?>
                    <li class="selected"><a href="index.php" >Home</a></li>
                    <li class="unselected"><a href="starters.php">Starters</a></li>
                    <li class="unselected"><a href="main_courses.php">Main Courses</a></li>
                    <li class="unselected"><a href="desserts.php">Desserts</a></li>
                    <li class="unselected"><a href="refreshment.php">Refreshment</a></li>
                    <li class="unselected"><a href="view_rev_rate.php">Reviews</a></li>
                    <li class="unselected"><a href="#">Contact</a></li>
             <?php } ?>
            <?php if (logged_in()&& $_SESSION['status']== 2){?>
                    <li class="unselected"><a href="index_cust.php">Home</a></li>
                    <li class="unselected"><a href="starters.php">Starters</a></li>
                    <li class="unselected"><a href="main_courses.php">Main Courses</a></li>
                    <li class="unselected"><a href="desserts.php">Desserts</a></li>
                    <li class="unselected"><a href="refreshment.php">Refreshment</a></li>
                    <li class="unselected"><a href="view_rev_rate.php">Reviews</a></li>
                    <li class="unselected"><a href="#" class="active">Contact</a></li>
             <?php } ?>
            <?php if (logged_in()&& $_SESSION['status']== 1){?>
                    <li class="unselected"><a href="index_staff.php">Staff</a></li>
                    <li class="unselected"><a href="new_content.php">Content</a></li>
                    <li class="unselected"><a href="index.php">Front End</a></li>
            <?php } ?>
            <?php if (logged_in()) {?>
                    <li class="unselected"> <a href="logout.php">Logout</a></li>
            <?php }else {?>
                    <li class="unselected"><a href="user_login.php">Login</a></li>
            <?php } ?>
        </ul>
    </div>
    <div id="body">
		<div id="content">	

