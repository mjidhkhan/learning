</div> 
        <div id="sidebar">
            <ul id="accordion">
                <li class="active">
                    Menu Planning navigation
                    <ul class="blocklist">
                        <li class="second">
                            Staff area
                            <ul>
                                <?php if($_SESSION['status'] ==1){ ?>
                                <li><a href="index.php">Front End</a></li>
                                <li><a href="new_dish.php"> New Dish </a></li>
                                <li><a href="view_orders.php">View orders</a></li>
                                <li><a href="new_staff.php">New Staff</a></li>
                                <li><a href="logout.php">Logout</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                        <li class="active">
                            Search
                                <ul>
                                    <li>
                                        <form method="get" class="searchform" action="search_result.php" >   
                                            <li class="small_inst"> Search for Meal course</li>
                                            <input type="text" size="24" value="" name="search" class="search" />
                                            <input type="submit" class="searchsubmit formbutton" name="submit" value="Go" />
                                        </form>	
                                    </li>
                                </ul>
                        </li>
            </ul>
