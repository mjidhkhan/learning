</div> 
        <div id="sidebar">
            <ul id="accordion">
        	<li class="active">
                Menu Planning navigation
                    <ul class="blocklist">
                            <li class="second">
                                Main area
                                <ul>
                                    <?php if (logged_in()&& $_SESSION['status']== 1){?>
                                    <li><a href="index_staff.php">Home</a></li>
                                    <?php }?>
                                    <li><a href="index.php">Home</a></li>
                                    <?php if (logged_in()&& $_SESSION['status']== 2){?>
                                    <li><a href="index_cust.php">Home</a></li>
                                     <?php }?>
                                </ul>
                            </li>
                    
                            <li class="second">
                                Meals area
                                <ul>
                                    <li><a href="meals.php">Meals</a></li>
                                    <li><a href="meal_veg.php">Vegetarian</a></li>
                                    <li><a href="meal_nonveg.php">None-Vegetarian</a></li>
                                    <?php if (logged_in()){?>
                                    <li><a href="order.php">Order</a></li>
                                    <?php }else{ ?>
                                </ul>
                            </li>
                    
                            <li class="second">
                                User area
                                <ul>
                                    <li><a href="new_cust.php">Register</a></li>
                                    <?php }?>
                                    <?php if (logged_in()) {?>
                                    <li> <a href="logout.php">Logout</a></li>
                                    <?php }else {?>
                                    <li><a href="user_login.php">Login</a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li class="second">
                                Search
                                <ul>
                                    <li>
                                        <form method="get" class="searchform" action="search_result.php" >   
                                        <li class="small_inst"> Search for Meal course<li>
                                        <input type="text" size="24" value="" name="search" class="search" />
                                        <input type="submit" class="searchsubmit formbutton" name="submit" value="Search" />
                                        </form>	
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </li>
            </ul>